<?php

namespace App\Model\Vehicle;

class Service extends \App\Model\Connection {


    function addService($insertData) {

        $serviceData = $this->prepareData($insertData);

        if(!$this->fetchRow('title', 'service_registrations', [ 'vehicleNumber' => $serviceData['vehicleNumber'], 'licenseNumber' => $serviceData['licenseNumber']])) {

            if($this->getTimeSlot($serviceData['timeSlote'], $serviceData['date'])){
                return $this->insertData('service_registrations', $serviceData);
            } else {
                echo '<script>alert("This Time Slote is Not available");</script>';
                
            }

        } else{

            echo '<script>alert("Your Service Already Register");</script>';
            
        }

    }

    function getServiceData() {
        return $this->fetchRow('*', 'service_registrations', ['userId' => $_SESSION['user']['userId']]);
    }

    function getTimeSlot($timeslote, $date) {

        $time = $this->fetchRow('count(timeSlote) as count, timeSlote', 'service_registrations', ['date' => $date], "Group BY timeSlote");

        foreach($time as $key => $val) {

            if($timeslote == $val['timeSlote']){
                if($val['count'] >= 3){
                    return false;
                }
            }
        }

        return true;
    }

    protected function prepareData($data) {

        $preparedData = [];

        $preparedData = array_merge($preparedData, ['title' => $data['title']]);
        $preparedData = array_merge($preparedData, ['vehicleNumber' => $data['vehicleNumber']]);
        $preparedData = array_merge($preparedData, ['licenseNumber' => $data['licenseNumber']]);
        $preparedData = array_merge($preparedData, ['date' => $data['date']]);
        $preparedData = array_merge($preparedData, ['timeSlote' => $data['timeSlote']]);
        $preparedData = array_merge($preparedData, ['vehicleIssue' => $data['vehicleIssue']]);
        $preparedData = array_merge($preparedData, ['serviceCenter' => $data['serviceCenter']]);
        $preparedData = array_merge($preparedData, ['status' => "0"]);
        $preparedData = array_merge($preparedData, ['userId' => $_SESSION['user']['userId']]);

        return $preparedData;
    }
}

?>