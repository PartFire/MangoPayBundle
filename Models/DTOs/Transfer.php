<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    22:37
 * File:    Transfer.php
 **/

namespace PartFire\MangoPayBundle\Models\DTOs;

class Transfer
{
    protected $resourceId;

    protected $tag;

    protected $authorId;

    protected $creditedUserId;

    protected $debitedCurrency;

    protected $creditedCurrency;

    protected $debitedAmount;

    protected $creditedAmount;

    protected $feeCurrency;

    protected $feeAmount;

    protected $debitedWalledId;

    protected $creditedWalledId;

    protected $status;

    protected $resultCode;

    protected $resultMessage;

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param mixed $authorId
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    /**
     * @return mixed
     */
    public function getCreditedUserId()
    {
        return $this->creditedUserId;
    }

    /**
     * @param mixed $creditedUserId
     */
    public function setCreditedUserId($creditedUserId)
    {
        $this->creditedUserId = $creditedUserId;
    }

    /**
     * @return mixed
     */
    public function getDebitedCurrency()
    {
        return $this->debitedCurrency;
    }

    /**
     * @param mixed $debitedCurrency
     */
    public function setDebitedCurrency($debitedCurrency)
    {
        $this->debitedCurrency = $debitedCurrency;
    }

    /**
     * @return mixed
     */
    public function getDebitedAmount()
    {
        return $this->debitedAmount;
    }

    /**
     * @param mixed $debitedAmount
     */
    public function setDebitedAmount($debitedAmount)
    {
        $this->debitedAmount = $debitedAmount;
    }

    /**
     * @return mixed
     */
    public function getFeeCurrency()
    {
        return $this->feeCurrency;
    }

    /**
     * @param mixed $feeCurrency
     */
    public function setFeeCurrency($feeCurrency)
    {
        $this->feeCurrency = $feeCurrency;
    }

    /**
     * @return mixed
     */
    public function getFeeAmount()
    {
        return $this->feeAmount;
    }

    /**
     * @param mixed $feeAmount
     */
    public function setFeeAmount($feeAmount)
    {
        $this->feeAmount = $feeAmount;
    }

    /**
     * @return mixed
     */
    public function getDebitedWalledId()
    {
        return $this->debitedWalledId;
    }

    /**
     * @param mixed $debitedWalledId
     */
    public function setDebitedWalledId($debitedWalledId)
    {
        $this->debitedWalledId = $debitedWalledId;
    }

    /**
     * @return mixed
     */
    public function getCreditedWalledId()
    {
        return $this->creditedWalledId;
    }

    /**
     * @param mixed $creditedWalledId
     */
    public function setCreditedWalledId($creditedWalledId)
    {
        $this->creditedWalledId = $creditedWalledId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getResultCode()
    {
        return $this->resultCode;
    }

    /**
     * @param mixed $resultCode
     */
    public function setResultCode($resultCode)
    {
        $this->resultCode = $resultCode;
    }

    /**
     * @return mixed
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    /**
     * @param mixed $resultMessage
     */
    public function setResultMessage($resultMessage)
    {
        $this->resultMessage = $resultMessage;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param mixed $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }

    /**
     * @return mixed
     */
    public function getCreditedAmount()
    {
        return $this->creditedAmount;
    }

    /**
     * @param mixed $creditedAmount
     */
    public function setCreditedAmount($creditedAmount)
    {
        $this->creditedAmount = $creditedAmount;
    }

    /**
     * @return mixed
     */
    public function getCreditedCurrency()
    {
        return $this->creditedCurrency;
    }

    /**
     * @param mixed $creditedCurrency
     */
    public function setCreditedCurrency($creditedCurrency)
    {
        $this->creditedCurrency = $creditedCurrency;
    }

}
