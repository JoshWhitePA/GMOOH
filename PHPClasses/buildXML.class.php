<?php
class XMLBuilder {
    function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
    
    public function buildMajor(){
        
        
    }
    
    public function buildGenEd(){
       // list of strings and list of integers placeholders
        $xmlString = "<?xml version='1.0' encoding='UTF-8'?><Checksheet>";
        $section = 0;
        $pos = 0;
        $results = DB::query("select ch.SecID,ch.PosID,SectionDesc,PosDesc, Dept,ClassNo,LowRange,HighRange 
                                FROM GenEdChecksheet ch
                                INNER JOIN GenEdRestrictions r
                                ON ch.CompID = r.CompID 
                                INNER JOIN GenEdSection s
                                ON ch.SecID = s.SectionID
                                INNER JOIN GenEdPosition p
                                ON ch.PosID = p.PosID
                                where ch.SecID = p.SectionID
                                ORDER BY SecID ASC, PosID ASC ");
        foreach ($results as $row) {
            if($section == 0){
                #sets the section var to track when a new section begins
               $section = $row['SecID'];
               $xmlString .= "<Section><SectionNo>" . $row['SecID'] . "</SectionNo><SectionDesc>" .  $row['SectionDesc'] . "</SectionDesc>";
            }elseif($row['SecID'] > $section){
                #if this is not the first section and the section ended before then
                #close old section
                $section = $row['SecID'];
                $xmlString .= "</Pos></Section>";
                 $xmlString .= "<Section><SectionNo>" . $row['SecID'] . "</SectionNo><SectionDesc>" .  $row['SectionDesc'] . "</SectionDesc>";
                $pos = 0;#reset pos because we strarted a new section
            }
            
            if($pos == 0){
                $pos = $row['PosID'];
                $xmlString .= "<Pos>";
                $xmlString .= "<PosDesc>" . $row['PosDesc'] . "</PosDesc>";
            }elseif($row['PosID'] > $pos){
                $xmlString .= "</Pos><Pos>";
                $xmlString .= "<PosDesc>" . $row['PosDesc'] . "</PosDesc>";
                $pos = $row['PosID'];
            }
            
            #create requirment instance
            $xmlString .= "<ReqInst>";
            #Puts Department in row
            $xmlString .= "<Dept>" . $row['Dept'] . "</Dept>";
            #starts the class nums tag
            $xmlString .= "<ClassNums>";
            
            
            #handles class number naming scheme, 
            if ($row['ClassNo'] != null){#if there is a class number then set it as what shows up, ex: MAT 30
                $xmlString .= $row['ClassNo'] . "</ClassNums>";
            }elseif($row['ClassNo'] == null && $row['LowRange'] != null && $row['HighRange'] == null){#there is no class number and there is a low class but the high class is null, ex MAT 10 - or above                
                $xmlString .= $row['LowRange'] . " or above</ClassNums>";
            }elseif($row['ClassNo'] == null && $row['LowRange'] != null && $row['HighRange'] != null){#if there is a lowRange and a highRange but not a regular number, :ex MAT 10 - 200
                $xmlString .= $row['LowRange'] . " - " . $row['HighRange'] . "</ClassNums>";    
            }elseif($row['ClassNo'] == null && $row['LowRange'] == null && $row['HighRange'] == null){#they are all null, means any class with that prefix is good. ex: Any AST course
                $xmlString .= "Any</ClassNums>";     
            }
            $xmlString .= "</ReqInst>";
        }
        
        #close the last section because there will be a unclosed tag after the loop ends
        $xmlString .= "</Pos></Section></Checksheet>";

         return $xmlString ;
    }
    
}

?>