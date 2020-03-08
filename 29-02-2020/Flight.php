<?php

class Flight {

    protected $booking = null;

    protected $demo = null;

    public function setBooking($booking)
    {
        $this->booking = $booking;
    }

    public function getBooking() 
    {
        return $this->booking;
    }

    public function bookNow()
    {
        $this->getBooking()->bookTicket();
    }
}

class Booking {

    protected $customer = null;

    public function setCustomer($customer)  
    {
        $this->customer = $customer;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function bookTicket()
    {
        echo $this->getCustomer()->getSeatNo();
    }
}

class Customer {

    protected $seatNo = null;

    public function setSeatNo($seatNo)
    {
        $this->seatNo = $seatNo;
    }

    public function getSeatNo()
    {
        return $this->seatNo;    
    }

}

echo '<pre>';

$customer = new Customer();
$customer->setSeatNo(25);

$booking = new Booking();
$booking->setCustomer($customer);

$flight = new Flight();
$flight->setBooking($booking);

print_r($flight->bookNow());