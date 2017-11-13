$(document).ready(main);
            var contador = 1;
            function main(){

                    $('#left').click(function(){
                    if(contador == 1){
                        $('.publicidad-left').animate({
                            left:'0'
                        });
                    }
                });          
                    $('#close').click(function(){
                    if(contador == 1){
                        $('.nuevapregunta').animate({
                            right:'-100%'
                        });
                    }
                });          
            }