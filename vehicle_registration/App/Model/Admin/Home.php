<?php

namespace App\Model\Admin;

class Home extends \App\Model\Connection {

    function getAllService() {

        return $this->getAll('service_registrations');
    }

    function changeStatus($id) {

        $status = $this->fetchRow('Status', 'service_registrations', ['serviceId' => $id]);

        $status = ($status[0]['Status'] == 0) ? 1 : 0;

        return $this->update(['Status' => $status], 'service_registrations', ['serviceId' => $id]);
    }

    function getData($id) {

        return $this->fetchRow('*', 'service_registrations', ['serviceId' => $id]);
    }

    function editService($id, $updateService) {

        $editData = $this->prepareData($updateService);

        if(!$this->fetchRow('title', 'service_registrations', ['vehicleNumber' => $editData['vehicleNumber'], 'licenseNumber' => $editData['licenseNumber']])) {

            if($this->getTimeSlot($editData['timeSlote'], $editData['date'])){
                return $this->update($editData, 'service_registrations', ['serviceId' => $id]);
            } else {
                echo '<script>alert("This Time Slote is Not available");</script>';
                
            }
        } else{

            echo '<script>alert("Service Already Register");</script>';
            
        }
        
    }

    function delteService($id){

        return $this->deleteRow('service_registrations', ['serviceId' => $id]);
    }

    function getTimeSlot($timeslote, $date) {

        $time = $this->fetchRow('count(timeSlote) as count, timeSlote', 'service_registrations', ['date' => $date], "Group BY timeSlote");

        var_dump($time);

        if($time) {
            foreach($time as $key => $val) {

                if($timeslote == $val['timeSlote']){
                    if($val['count'] >= 3){
                        return false;
                    }
                }
            }
        } else
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

        return $preparedData;
    }
}

?>