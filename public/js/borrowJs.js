
$(document).ready(function () {



	$(".Borrow").on("click",function (e) {

        e.preventDefault() ;
        var id=$(this).attr("book-id");
        $.ajax({
            url:"BorrowController.php?id="+id,
            type:"GET",
            success: (json) =>{

                if(json)
                {
                    $(location).attr('href',"login.php");
                }
                else
                {
                $(this).attr("disabled", true);
                 $(this).attr("class", "btn btn-danger");
                 $(this).text("Not available");

                }

             
            }


        })

            .done(function()
            {
               


            });


    });











});