<?php

namespace App\Model\Admin;

class CMSModel extends \App\Model\Connection {

    function addCMS($insertData) {

        $data = $this->prepareData($insertData);

        return $this->insertData('cms', $data);
    }

    function getData() {

        return $this->getAll('cms');
    }

    function getRow($colName, $id) {

        return $this->fetchRow($colName, 'cms', ['cmsId' => $id]);
    }

    function updateCMS($upadteData, $updateId) {

        $upadteData = $this->prepareData($upadteData);

        return $this->update($upadteData, 'cms', ['cmsId' => $updateId]);
    }

    function deleteCMS($deleteId) {

        return $this->deleteRow('cms', ['cmsId' => $deleteId]);
    }

    private function prepareData($data) {
        $preparedData = [];

        $preparedData = array_merge($preparedData, ['cmsName' => $data['cmsName']]);
        $preparedData = array_merge($preparedData, ['UrlKey' => $data['UrlKey']]);
        $preparedData = array_merge($preparedData, ['status' => $data['status']]);
        $preparedData = array_merge($preparedData, ['content' => $data['content']]);

        return $preparedData;
    }
}

?>