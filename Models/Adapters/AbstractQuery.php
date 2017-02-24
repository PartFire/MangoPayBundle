<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    27/11/2016
 * Time:    21:12
 * File:    AbstractQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\MangoPayApi;
use Monolog\Handler\StreamHandler;
use Symfony\Bridge\Monolog\Logger;

abstract class AbstractQuery
{
    /**
     * @var MangoPayApi
     */
    protected $mangoPayApi;
    /**
     * @var Logger
     */
    protected $logger;

    public function __construct($clientId, $clientPassword, $baseUrl, MangoPayApi $mangoPayApi, Logger $logger)
    {
        $this->logger = $logger;
        $path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR. 'var/logs/mangopay.log';
        $this->logger->pushHandler(new StreamHandler($path, Logger::DEBUG));

        $this->mangoPayApi = $mangoPayApi;
        $this->mangoPayApi->Config->ClientId = $clientId;
        $this->mangoPayApi->Config->ClientPassword = $clientPassword;
        $this->mangoPayApi->Config->BaseUrl = $baseUrl;
        $this->mangoPayApi->Config->TemporaryFolder = sys_get_temp_dir();
        $this->mangoPayApi->setLogger($this->logger);
    }
}
