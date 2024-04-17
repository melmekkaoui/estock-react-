<?php 


    class Alert{


        /**
         * 
         * alert success
         * 
         */
        public static function success($message){
            echo "<script>Swal.fire({
                title: 'Operation Success',
                text: '".$message."',
                icon: 'success',
                confirmButtonText: 'suivre'
              });</script>";
        }
        public static function error($title,$msg){
            echo "
                <script>
                    Swal.fire({
                        title: 'une erreur s est produite',
                        text: '".$msg."',
                        icon: 'error',
                        confirmButtonText: 'suivre'
                    });
                </script>
            
            ";
        }
        public static function redirect($page,$msg,$err='success'){
            echo "<script>

            Swal.fire({
                title: 'Operation Compléte',
                text: '".$msg."',
                icon: '".$err."',
                confirmButtonText: 'suivre',
            }).then(function() {
                window.location = '".$page."';
            });
            

            </script>";

        }

    }



?>