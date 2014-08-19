<!--<script type="text/javascript">-->
    var data = <?php
                $data1 = array();
                
                $multitab = array(
                '07-08-2014 01:00' => array(
                       '15-17' => array('male' => 4, 'females' => 8),
                       '18-24' => array('male' => 5, 'females' => 2),
                       '25-34' => array('male' => 18, 'females' => 13),
                       '35-44' => array('male' => 12, 'females' => 25)
                ),
                '07-08-2014 02:00' => array(
                       '15-17' => array('male' => 17, 'females' => 42),
                       '18-24' => array('male' => 74, 'females' => 53),
                       '25-34' => array('male' => 98, 'females' => 41),
                       '35-44' => array('male' => 5, 'females' => 12)
                ),
                '07-08-2014 03:00' => array(
                       '15-17' => array('male' => 31, 'females' => 87),
                       '18-24' => array('male' => 31, 'females' => 6),
                       '25-34' => array('male' => 53, 'females' => 3),
                       '35-44' => array('male' => 3, 'females' => 4)
                ),
                '07-08-2014 04:00' => array(
                       '15-17' => array('male' => 31, 'females' => 35),
                       '18-24' => array('male' => 12, 'females' => 31),
                       '25-34' => array('male' => 87, 'females' => 21),
                       '35-44' => array('male' => 43, 'females' => 98)
                ),
                '07-08-2014 05:00' => array(
                       '15-17' => array('male' => 43, 'females' => 21),
                       '18-24' => array('male' => 65, 'females' => 24),
                       '25-34' => array('male' => 76, 'females' => 65),
                       '35-44' => array('male' => 4, 'females' => 13)
                ),
                '08-08-2014 01:00' => array(
                       '15-17' => array('male' => 45, 'females' => 63),
                       '18-24' => array('male' => 42, 'females' => 42),
                       '25-34' => array('male' => 42, 'females' => 74),
                       '35-44' => array('male' => 87, 'females' => 85)
                ),
                '08-08-2014 02:00' => array(
                       '15-17' => array('male' => 15, 'females' => 53),
                       '18-24' => array('male' => 131, 'females' => 53),
                       '25-34' => array('male' => 15, 'females' => 53),
                       '35-44' => array('male' => 12, 'females' => 41)
                ),
                '08-08-2014 03:00' => array(
                       '15-17' => array('male' => 32, 'females' => 31),
                       '18-24' => array('male' => 154, 'females' => 64),
                       '25-34' => array('male' => 34, 'females' => 41),
                       '35-44' => array('male' => 16, 'females' => 86)
                ),

                );
                
                foreach ($multitab as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                        foreach ($value2 as $key3 => $value3) {
                            $acum += $value3 ;
                            
                        }
                    }
                    $resulViolento[$key] = $acum;
                    $acum = 0;
                }
                
                
   
                
                
                //Harcoded date Version 1s.1
                $data1['bar'] = array(
                    'date' => array_keys($resulViolento),
                    'visits' => array_values($resulViolento) 
                );
                
                echo '<pre>';
                var_dump($resulViolento);
                echo '</pre>';
                
             
                
                
                //echo json_encode($data1);
                ?>
<!--</script>-->

