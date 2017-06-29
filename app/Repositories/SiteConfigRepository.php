<?php
/**
 * Created by PhpStorm.
 * User: Pradip
 * Date: 5/30/2017
 * Time: 8:18 AM
 */

namespace App\Repositories;
use App\Model\SiteConfig;


class SiteConfigRepository
{
    private  $siteConfigs;

    public function __construct(SiteConfig $config)
    {
        $this->siteConfigs = $config;
    }

    public function select($data)
    {
        return $this->siteConfigs->select($data)->get();
    }


    public function create(array $data)
    {
        return $this->siteConfigs->create($data);
    }

    public function findById($id)
    {
        return $this->siteConfigs->findorFail($id);
    }

    public function delete($id)
    {
        $site_configs= $this->findById($id);
        $site_configs->delete();
        return $site_configs;

    }

    public function update($id, $data)
    {
       $site_config =  $this->findById($id);
       $site_config->key = $data['key'];
       $site_config->value = $data['value'];
       $site_config->status = $data['status'];
       $site_config->save();
       return true;
    }






}