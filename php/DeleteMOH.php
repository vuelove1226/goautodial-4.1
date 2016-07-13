<?php
	/**
	 * Generates action circle buttons for different pages/module
	 * @param goUser 
	 * @param goPass 
	 * @param goAction 
	 * @param responsetype
	 * @param moh_id
	 */
        require_once('goCRMAPISettings.php');
        
        $url = gourl."/goMusicOnHold/goAPI.php"; #URL to GoAutoDial API. (required)
        
        $postfields["goUser"] = goUser; #Username goes here. (required)
        $postfields["goPass"] = goPass; #Password goes here. (required)
        $postfields["goAction"] = "goDeleteMOH"; #action performed by the [[API:Functions]]. (required)
        $postfields["responsetype"] = responsetype; #json. (required)
        $postfields["moh_id"] = $_POST['moh_id']; #Desired uniqueid. (required)
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
        $data = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($data);

        if ($output->result=="success") {
                # Result was OK!
                echo 1;
        }else{
                echo $output->result;
        }
?>