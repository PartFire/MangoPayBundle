<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    18/01/2017
 * Time:    16:18
 * File:    CardQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;


use MangoPay\CardRegistration;
use MangoPay\CardRegistrationStatus;
use MangoPay\MangoPayApi;
use PartFire\MangoPayBundle\Models\CardQueryInterface;
use PartFire\MangoPayBundle\Models\DTOs\Card;
use PartFire\MangoPayBundle\Models\DTOs\Translators\CardTranslator;
use Symfony\Bridge\Monolog\Logger;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;

class CardQuery extends AbstractQuery implements CardQueryInterface
{
    /**
     * @var CardTranslator
     */
    private $cardTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        CardTranslator $cardTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl, $mangoPayApi, $logger);
        $this->cardTranslator = $cardTranslator;
    }

    public function get($cardId): ? Card
    {
        // TODO: Implement get() method.
    }

    public function getRegistration($cardRegistrationId): ? Card
    {
        // TODO: Implement getRegistration() method.
    }

    public function create(string $userId, string $currency, string $cardType, string $tag): ? Card
    {
        try {
            $CardRegistration = new CardRegistration();
            $CardRegistration->Tag = $tag;
            $CardRegistration->UserId = $userId;
            $CardRegistration->Currency = $currency;
            $CardRegistration->CardType = $cardType;

            $cardRegistration = $this->mangoPayApi->CardRegistrations->Create($CardRegistration);
            return $this->cardTranslator->translateMangoDataToDto($cardRegistration);
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function update(string $cardRegisteredId, string $registrationData)
    {
        try {
            $cardRegister = $this->mangoPayApi->CardRegistrations->Get($cardRegisteredId);
            if ($cardRegister instanceof CardRegistration) {
                $cardRegister->RegistrationData = 'data=' . $registrationData;
                $updatedCardRegister = $this->mangoPayApi->CardRegistrations->Update($cardRegister);

                if ($updatedCardRegister instanceof CardRegistration) {
                    if ($updatedCardRegister->Status != CardRegistrationStatus::Validated ||
                        !isset($updatedCardRegister->CardId)) {
                        $this->logger->addCritical("Cannot create card. Payment has not been created.");
                        throw new PartFireException("Cannot create card. Payment has not been created.");
                    }
                    return $this->cardTranslator->translateMangoDataToDto($updatedCardRegister);
                }
                $this->logger->addCritical("Card Registration failed when trying to update via API.");
                throw new PartFireException("Card Registration failed when trying to update via API.");
            }

            $this->logger->addCritical("Card Registration ID: $cardRegisteredId not found when querying API.");
            throw new PartFireException("Card Registration ID: $cardRegisteredId not found when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
