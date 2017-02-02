<?php
class Form
{
    public $name;
    private $cityName;
    private $stateName;
    private $zipCode;
    private $countryName;
    private $noInParty;
    private $travelingFor;
    private $howDidYouHear;
    private $didYouStay;
    private $email;

public function __construct($name, $cityName, $stateName, $zipCode, $countryName, $noInParty, $travelingFor, $howDidYouHear, $didYouStay, $email=null )
{

   $this-> setName($name);
   $this-> setCityName($cityName);
   $this-> setStateName($stateName);
   $this-> setZipCode($zipCode);
   $this-> setCountryName($countryName);
   $this-> setNoInParty($noInParty);
   $this-> setTravelingFor($travelingFor);
   $this-> setHowDidYouHear($howDidYouHear);
   $this-> setDidYouStay($didYouStay);
   $this-> setEmail($email);

}

 public function getName() { return $this->name; }
 public function getCityName() { return $this->cityName; }
 public function getStateName() { return $this->stateName; }
 public function getZipCode() { return $this->zipCode; }
 public function getCountryName() { return $this->countryName;}
 public function getNumberInParty() { return $this->noInParty; }
 public function getTravelingFor() { return $this->travelingFor; }
 public function getHowDidYouHear() { return $this->howDidYouHear; }
 public function getDidYouStay() { return $this->didYouStay; }
 public function getEmail() { return $this->email; }


public function setName ($name)
{
    $this->name=$name;
}

public function setCityName ($cityName)
{
    $this->cityName=$cityName;
}

public function setStateName ($stateName)
{
    $this->stateName=$stateName;
}

public function setZipCode ($zipCode)
{
    $this->zipCode=$zipCode;
}

public function setCountryName ($countryName)
{
    $this->countryName=$countryName;
}

public function setNoInParty ($noInParty)
{
    $this->noInParty=$noInParty;
}

public function setTravelingFor ($travelingFor)
{
    $this->travelingFor=$travelingFor;
}

public function setHowDidYouHear ($howDidYouHear)
{
    $this->howDidYouHear=$howDidYouHear;
}

public function setDidYouStay ($didYouStay)
{
    $this->didYouStay=$didYouStay;
}

public function setEmail ($email)
{
    $this->email=$email;
}

public function _toString()
{

 return $this->name."<br/>". $this->cityName."<br/>". $this->countryName;

}

}
?>