<?php
	namespace Src;

	class MyGreeter{
		public function __construct(){

		}

		/**
		 * Make a suitable greeting message based different time frames.
		 * @return string 
		 */
		public function greeting() :string{
			$hour = date('G');
			$greeting_msg = null;

			if($hour >=6 && $hour < 12){//We take the time frame 06 ~ 12 as the morning.
				$greeting_msg = 'Good morning';
			}else if($hour >= 12 && $hour < 18){//We take the time frame 12 ~ 18 as the afternoon.
				$greeting_msg = 'Good afternoon';
			}else{//The time frames 18 ~ 24 and 0 ~ 6 as the evening.
				$greeting_msg = 'Good evening';
			}

			return $greeting_msg;
		}
	}