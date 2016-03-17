<?php
class XMLBuilder {
    function __construct() {
  			require_once 'meekrodb.2.3.class.php';
   		}
    
    public function buildFullSheet($InpProgramID){
        $xmlString  = "<?xml version='1.0' encoding='UTF-8'?>";
        $xmlString .= "<GMOOH>";
        $xmlString .= $this -> buildGenEd();
        $xmlString .= $this -> buildMajor($InpProgramID);
        $xmlString .= "</GMOOH>";
        return $xmlString;
    }
    
    
    public function buildMajor($InpProgramID){
        //DB::debugMode();
        $xmlString .= "<Checksheet><Program>";
        $compID = 0;//used in second query
        $tracker = 0;//Placeholder varriable, lets me know if it is itterating in the loops
        $programRes = DB::queryFirstRow("Select PrgCompID, ProgramTitle,ProgramNo,ProgramVersion,ProgramAbriv,ProgramNotes 
                                        from Program p, ProgramComp pc 
                                        where p.ProgramID = %i 
                                        and p.ProgramID = pc.ProgramID",$InpProgramID);
        //Gets the info about the program and retrieves the compID
        $compID = $programRes['PrgCompID'];
        $xmlString .= "<ProgramTitle>" . $programRes['ProgramTitle'] . "</ProgramTitle>";
        $xmlString .= "<ProgramNo>" . $programRes['ProgramNo'] . "</ProgramNo>";            
        $xmlString .= "<ProgramVersion>" . $programRes['ProgramVersion'] . "</ProgramVersion>";
        $xmlString .= "<ProgramAbriv>" . $programRes['ProgramAbriv'] . "</ProgramAbriv>";
        $xmlString .= "<ProgramNotes>" . $programRes['ProgramNotes'] . "</ProgramNotes>";
        
        $columnQ = DB::query("Select PrgColumnDesc,PrgColumn,PrgColumn 
                                from ProgramColumn 
                                where PrgCompID = %i",$compID);
         foreach ($columnQ as $row1) {
             $xmlString .= "<Column>";
             $xmlString .= "<ColumnDesc>" . $row1['PrgColumnDesc'] . "</ColumnDesc>";
             $xmlString .= "<ColumnNo>" . $row1['PrgColumn'] . "</ColumnNo>";
             
             //Things about to get cray, hold on to yer butts
             $sectionQ = DB::query("Select PrgSection,PrgSectionDesc
                                    from ProgramSection 
                                    where PrgCompID = %i
                                    and PrgColumn = %i",$compID,$row1['PrgColumn']);
             foreach ($sectionQ as $row2) {
                 $xmlString .= "<Section>";
                 $xmlString .= "<SectionDesc>" . $row2['PrgSectionDesc'] . "</SectionDesc>";
                 $classQ = DB::query("Select ClassID 
                                        from ProgramChecksheet pch
                                        where PrgCompID = %i 
                                        and PrgColumn = %i
                                        and PrgSection = %i",$compID,$row1['PrgColumn'],$row2['PrgSectionDesc']);
                 foreach ($classQ as $row3) {
                     $tracker += 1;
                     $xmlString .= "<Class>";
                     $xmlString .= "<ClassID>" . $row3['ClassID'] . "</ClassID>";
                     $xmlString .= "<ClassDept>". "$tracker" . "</ClassDept>";
                     $xmlString .= "<ClassNo>". "$tracker" . "</ClassNo>";  
                     $xmlString .= "<ClassDesc>". "$tracker" . "</ClassDesc>"; 
                     $xmlString .="<ClassGrade></ClassGrade>";
                     $xmlString .= "</Class>";

                 }
                $xmlString .= "</Section>";
             }
            $xmlString .= "</Column>";
         }
            
        $xmlString .= "</Program></Checksheet>";
        
        return $xmlString;
        
    }
    
    public function buildGenEd(){
//        DB::debugMode();
       // list of strings and list of integers placeholders
        $xmlString .= "<Checksheet>";
        $section = 0;
        $pos = 0;
        $endsQ = DB::query("select DISTINCT Ends from GenEdChecksheet");
        foreach ($endsQ as $row1) {
            $xmlString .= "<End>";
            $xmlString .= "<EndNumber>" . $row1['Ends'] . "</EndNumber>";
//            echo "<br/>End: " . $row1['Ends'];
            $columnQ = DB::query("select DISTINCT Columns from GenEdChecksheet where Ends = %i",$row1['Ends']);
            foreach ($columnQ as $row2) {
                $xmlString .= "<Column>";
                $xmlString .= "<ColumnNum>" . $row2['Columns'] . "</ColumnNum>";
//                echo "<br/>Column: " . $row2['Columns'];
                $sectionQ = DB::query("select DISTINCT SectionID, SectionDesc from GenEdChecksheet gc,GenEdSection gs
                                       where Ends = %i 
                                       and Columns = %i 
                                       and gc.SecID = gs.SectionID",$row1['Ends'],$row2['Columns']);
                foreach ($sectionQ as $row3) {
                    $xmlString .= "<Section>";
                    $xmlString .= "<SectionID>" . $row3['SectionID'] . "</SectionID>";
                    $xmlString .= "<SectionDesc>" . $row3['SectionDesc'] . "</SectionDesc>";
//                    echo "<br/>Section: " . $row3['SectionID'];
                    $posQ = DB::query("select gc.PosID,PosDesc from GenEdChecksheet gc,GenEdPosition gp
                                       where Ends = %i 
                                       and Columns = %i 
                                       and gc.PosID = gp.PosID
								       and gc.SecID = gp.SectionID
                                       and gc.SecID = %i",$row1['Ends'],$row2['Columns'],$row3['SectionID']);
                    foreach ($posQ as $row4) {
                        $xmlString .= "<Pos>";
                        $xmlString .= "<PosID>" . $row4['PosID'] . "</PosID>";                                        $xmlString .= "<PosDesc>" . $row4['PosDesc'] . "</PosDesc>";
                        $xmlString .= "<PosUserTake> </PosUserTake>";
                        $xmlString .="<ClassGrade></ClassGrade>";
//                        echo "<br/>PosID: " . $row4['PosID'];
                        $reqQ = DB::query("select Dept,ClassNo,LowRange,HighRange,gc.CompID
                                            from GenEdChecksheet gc, GenEdRestrictions gr
                                            where Ends = %i
                                            and Columns = %i
                                            and SecID = %i
                                            and PosID = %i
                                            and gc.CompID = gr.CompID",
                                            $row1['Ends'],$row2['Columns'],$row3['SectionID'],$row4['PosID']);
                         foreach ($reqQ as $row5) {
                            $xmlString .= "<ReqInst>";
                            #Puts Department in row
                            $xmlString .= "<Dept>" . $row5['Dept'] . "</Dept>";
                            #starts the class nums tag
                            $xmlString .= "<ClassNums>";
//                            echo "<br/>Dept: " . $row5['Dept'];

                            #handles class number naming scheme, 
                            if ($row5['ClassNo'] != null){#if there is a class number then set it as what shows up, ex: MAT 30
                                $xmlString .= $row5['ClassNo'] . "</ClassNums>";
                            }elseif($row5['ClassNo'] == null && $row5['LowRange'] != null && $row5['HighRange'] == null){#there is no class number and there is a low class but the high class is null, ex MAT 10 - or above                
                                $xmlString .= $row5['LowRange'] . " or above</ClassNums>";
                            }elseif($row5['ClassNo'] == null && $row5['LowRange'] != null && $row5['HighRange'] != null){#if there is a lowRange and a highRange but not a regular number, :ex MAT 10 - 200
                                $xmlString .= $row['LowRange'] . " - " . $row5['HighRange'] . "</ClassNums>";    
                            }elseif($row5['ClassNo'] == null && $row5['LowRange'] == null && $row5['HighRange'] == null){#they are all null, means any class with that prefix is good. ex: Any AST course
                                $xmlString .= "Any</ClassNums>";     
                            }
                            

                            $xmlString .= "</ReqInst>";
                         }
                        $xmlString .= "</Pos>";
                    }
                    $xmlString .= "</Section>";
                }
                $xmlString .= "</Column>";
            }
            $xmlString .= "</End>";
        }
         $xmlString .= "</Checksheet>";
//        echo "<br/><br/>";
         return $xmlString ;
    }
    
}

?>