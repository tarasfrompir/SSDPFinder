<?php
/*
* @version 0.1 (wizard) скрипт установки модуля и записи данных об устройстве в базу ssdp_devices
*/

// install module for device
  //имя модуля для этого устройства
  global $namemodule;
  // установлен ли этот модуль
  global $installed_module;
  // проверяем на наличие модуля
  if (!$installed_module) {
    // если нету то устанавливаем модуль по названию которое находится в переменной $namemodule
    include_once (DIR_MODULES.'market/market.class.php');
    $mkt=new market();
    }   
  

// добавление устройства в таблицу ssdp_devices
  $table_name='ssdp_devices';
  $rec=SQLSelectOne("SELECT * FROM $table_name WHERE ID='$id'");
   global $session;
  //updating '<%LANG_TITLE%>' (varchar, required)
   global $title;
   $rec['TITLE']=$title;
   //updating 'controladdress' (varchar)
   global $controladdress;
   $rec['CONTROLADDRESS']=$controladdress;
   //updating 'Uuid' (varchar)
   global $uuid;
   $rec['UUID']=$uuid;
   //updating 'TITLE' (varchar)
   global $title;
   $rec['TITLE']=$title;
  //updating 'Type' (varchar)
   global $type;
   $rec['TYPE']=$type;
  //updating 'services' (varchar)
   global $services;
   $rec['SERVICES']=$services;
   //updating 'Address' (varchar)
   global $address;
   $rec['ADDRESS']=$address;
   //updating 'Description' (varchar)
   global $description;
   $rec['DESCRIPTION']=$description;
   //updating 'Model' (varchar)
   global $model;
   $rec['MODEL']=$model;
   //updating 'Manufacturer' (varchar)
   global $manufacturer;
   $rec['MANUFACTURER']=$manufacturer;
   //updating 'location' (varchar)
   global $location;
   $rec['LOCATION']=$location;
   //updating 'Logo' (varchar)
   $rec['LOGO']=$_SESSION[$uuid];
   //updating '<%LANG_LINKED_OBJECT%>' (varchar)
   global $namemodule;
   $rec['LINKED_OBJECT']="Модуль ".$namemodule;
   //updating '<%LANG_METHOD%>' (varchar)
   global $linked_method;
   $rec['LINKED_METHOD']=$linked_method;
   //updating '<%LANG_UPDATED%>' (datetime)
   global $updated_date;
   global $updated_minutes;
   global $updated_hours;
   $rec['USE_TO_SAY']=0;
   $rec['UPDATED']=toDBDate($updated_date)." $updated_hours:$updated_minutes:00";
   if ($rec['ID']) {
      SQLUpdate($table_name, $rec); // update
    } else {
       $new_rec=1;
       $rec['ID']=SQLInsert($table_name, $rec); // adding new record
    }
    $out['OK']=1;
    // после сохранения устройства переходим на основную страницу 
    $this->redirect("?");

