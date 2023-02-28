<?php

namespace App\Models;

use CodeIgniter\Model;

class WeatherModel extends Model
{
    public function hg_request($parametros, $chave = null, $endpoint = 'weather')
    {
        $url = 'http://api.hgbrasil.com/'.$endpoint.'/?format=json&';
        
        if(is_array($parametros)){
            // Insere a chave nos parametros
            if(!empty($chave)) $parametros = array_merge($parametros, array('key' => $chave));
            
            // Transforma os parametros em URL
            foreach($parametros as $key => $value){
            if(empty($value)) continue;
            $url .= $key.'='.urlencode($value).'&';
            }
            
            // Obtem os dados da API
            try {
                $resposta = file_get_contents(substr($url, 0, -1));
            } catch(\Exception $e) {
                $resposta = '';
            }

            return json_decode($resposta, true);
        } else {
            return false;
        }
    }
}
