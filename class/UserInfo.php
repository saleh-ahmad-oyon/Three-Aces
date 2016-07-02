<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

class UserInfo
{
    /**
     * Get the client IP address
     *
     * Calculate the client IP address
     *
     * @param
     *
     * @return String $ipaddress     IP address of the client
     */
    public static function getClientIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * Browser Information
     *
     * Calculate Browser Name using Browser Information
     *
     * @param string $user_agent     the value of $_SERVER['HTTP_USER_AGENT']
     *
     * @return string     Return Browser Name
     */
    public static function getBrowserName($user_agent)
    {
        if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
        elseif (strpos($user_agent, 'Edge')) return 'Edge';
        elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
        elseif (strpos($user_agent, 'Safari')) return 'Safari';
        elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
        elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

        return 'Other';
    }

    /** 
     * Get the user network information
     * 
     * Get the Network Information using http://ip-api.com/
     * 
     * @param string $ip     IP address of the user
     * 
     * @return array $info     Network information
     */
    public static function getNetworkInformation($ip) {
        $info = [
            'asNumber'    => '',
            'city'        => '',
            'country'     => '',
            'countryCode' => '',
            'isp'         => '',
            'latitude'    => '',
            'longitude'   => '',
            'query'       => '',
            'region'      => '',
            'regionName'  => '',
            'status'      => '',
            'timeZone'    => '',
            'zip'         => ''
        ];
        $query = @json_decode(file_get_contents('http://ip-api.com/json/'.$ip));
        if($query->status == 'success') {
            $info = [
                'asNumber'    => $query->as,
                'city'        => $query->city,
                'country'     => $query->country,
                'countryCode' => $query->countryCode,
                'isp'         => $query->isp,
                'latitude'    => $query->lat,
                'longitude'   => $query->lon,
                'org'         => $query->org,
                'query'       => $query->query,
                'region'      => $query->region,
                'regionName'  => $query->regionName,
                'status'      => $query->status,
                'timeZone'    => $query->timezone,
                'zip'         => $query->zip
            ];
        }
        
        return $info;
    }
}
