<?php
class get_vars {
	public  $url;
	public $get_vars;
	public $get_vals;
	public $new_url;
	function extract () {
		$explode1=explode("?",$this->url);
		$this->new_url=$explode1[0];
		$explode2=explode("&",$explode1[1]);
		$i=0;
		while ($i<count($explode2)){
			$explode3=explode("=",$explode2[$i]);
			$this->get_vars[$i]=$explode3[0];
			$this->get_vals[$i]=$explode3[1];
			$i++;
		}
	}
	function insert($newvar,$newval){
		$i=0;
		$ii=0;
		while (($i==0) and ($ii < count($this->get_vars))) {
			if ($this->get_vars[$ii]==$newvar) {
				print $this->get_vars[$ii]." was ".$this->get_vals[$ii]."\n";
				$this->get_vals[$ii]=$newval;
				print $this->get_vars[$ii]." is now ".$this->get_vals[$ii]."\n";
				$i=1;
			}
			else $ii++;
		}
	}
	function create_url(){
		$i=0;
		$this->new_url.="?";
		while ($i<count($this->get_vars)){
			if ($i!=0)$this->new_url.="&";
			$this->new_url.=$this->get_vars[$i]."=".$this->get_vals[$i];
			$i++;
		}
	}
}
?>