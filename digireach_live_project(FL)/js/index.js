


$(document).ready(function () {
    let submanu = false;
    
    $("#serviceid").click(function () { 
    
        if(submanu == false){
            submanu = true;
            // console.log(1); 
            $("#service-submanu").css("display", "block");
            $("#serviceIcon").removeClass("bi-caret-right-fill");
            $("#serviceIcon").addClass("bi-caret-down-fill");
            
        } else{
            $("#service-submanu").css("display", "none");
            $("#serviceIcon").removeClass("bi-caret-down-fill");
            $("#serviceIcon").addClass("bi-caret-right-fill");
            submanu = false;

        }

        
    });
    
    $("#ourproduct").click(function () {
        $('html,body').animate({
            scrollTop: $("#productCategories").offset().top
        }, 'slow');
    });

    

    var splide1 = new Splide('#slide1', {
        type: 'fade',
        rewind: true,
        autoplay: true,
        
    });
    splide1.mount();

    var splide2 = new Splide('#slide2', {
        type: 'loop',
        perPage: 3,
        autoplay: true,
        focus: 0,
        omitEnd: true,
        breakpoints: {
            1200: { perPage: 2, gap: '1rem' },
            768 : { perPage: 1, gap: 0 },
          },
    });
    splide2.mount();

    var splide3 = new Splide('#slide3', {
        type: 'loop',
        perPage: 4,
        autoplay: true,
        focus: 0,
        omitEnd: true,
        breakpoints: {
            1200: { perPage: 3, gap: '1rem' },
            992: { perPage: 2, gap: '1rem' },
            768 : { perPage: 1, gap: 0 },
          },
    });
    splide3.mount();
    var splide4 = new Splide('#slide4', {
        type: 'loop',
        perPage: 2,
        autoplay: true,
        focus: 0,
        omitEnd: true,
        breakpoints: {
            1200: { perPage: 2, gap: '1rem' },
            768 : { perPage: 1, gap: 0 },
          },
    });
    splide4.mount();
    var splide5 = new Splide('#slide5', {
        
        type: 'loop',
        perPage: 5,
        autoplay: true,
        focus: 0,
        omitEnd: true,
        breakpoints: {
            1500: { perPage: 4, gap: '1rem' },
            1200: { perPage: 3, gap: '1rem' },
            768 : { perPage: 2, gap: 0 },
            450 : { perPage: 1, gap: 0 },
          },
    });
 
    splide5.mount();


    $("#editFormsubmitButton").click(function (e) {
        // e.preventDefault();


        $("#myForm").validate({
            rules: {
                vname: {
                    required: true,
                    // pattern: /^[A-Za-z]+$/
                },
                vemail: {
                    required: true,
                    // pattern: /^[A-Za-z]+$/
                    email: true
                },
                vmobileNumber:
                {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10,

                },
                vquery: {
                    required: true,

                }

            },
            // messages: {


            //     vemail: {
            //         required: "Please enter Last Name.",
            //         email: "Enter valid email."
            //     },


            // },
            submitHandler: function (myform) {
                var empvname = $('#vname').val();
                var empvemail = $('#vemail').val();
                var empvmobileNumber = $('#vmobileNumber').val();
                var empvquery = $('#vquery').val();


                $.ajax({
                    type: "POST",
                    url: "add-form-backend.php",
                    data: {
                        name: empvname,
                        email: empvemail,
                        mobileNumber: empvmobileNumber,
                        Query: empvquery,

                    },
                    cache: true,
                    success: function (data1) {
                        $(document).ajaxStop(function () {
                            window.location.reload();
                        });
                        alert("Your form has been Submited" + data1);

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                    }
                });

            }
        });
    });
});