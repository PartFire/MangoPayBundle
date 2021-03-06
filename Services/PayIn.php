<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    19/01/2017
 * Time:    12:18
 * File:    PayIn.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\DTOs\BankwireDirectPayIn;
use PartFire\MangoPayBundle\Models\DTOs\CardDirectPayIn;
use PartFire\MangoPayBundle\Models\PayInQueryInterface;

class PayIn
{
    /**
     * @var PayInQueryInterface
     */
    private $payInQuery;

    public function __construct(PayInQueryInterface $payInQuery)
    {
        $this->payInQuery = $payInQuery;
    }

    public function createCardDirectPayIn(CardDirectPayIn $cardDirectPayInDto)
    {
        return $this->payInQuery->createPayInCardDirect($cardDirectPayInDto);
    }

    public function createBankWireDirectPayIn(BankwireDirectPayIn $bankwireDirectPayIn)
    {
        return $this->payInQuery->createBankWireDirectPayIn($bankwireDirectPayIn);
    }

    public function getPayIn($id)
    {
        return $this->payInQuery->get($id);
    }
}
