<?php
 
namespace common\models;
  
class ValueHelpers 
  
{
      
        // returnt den benutzergruppevalue der bg die man eingibt
 
     public static function getRoleValue($bg_name)
     {
        
        $connection = \Yii::$app->db;
         $sql = "SELECT bg_id FROM benutzergruppe WHERE bg_name=:bg_name";
        $command = $connection->createCommand($sql);
        $command->bindValue(":bg_name", $bg_name);
        $result = $command->queryOne();
 
        return $result['bg_id'];
     }
	 
	 // verlangt bestimmt benutzergruppe, return true/false
	 
	  public static function requireRole($bg_name)
      {
            if ( Yii::$app->user->identity->bg_id == ValueHelpers::getRoleValue($bg_name)) {
                            
                return true;
                            
            } else {
    
                return false;
    
            }
                    
      }
                    
            // verlangt mindenstens benutzergruppe von ...
                    
      public static function requireMinimumRole($role_name)
      {
            if ( Yii::$app->user->identity->role_id >= ValueHelpers::getRoleValue($role_name)) {
                            
                return true;
                            
            } else {
                            
                return false;
    
      }
    
      
     
		}
}