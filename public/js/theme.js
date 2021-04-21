// js Document

    // Created on   : 07/06/2018.
    // Theme Name   : Conis.
    // Description  : Conis - Business And Finance HTML Template
    // Version      : 1.0.
    // Author       : @CreativeGigs.
    // Developed by : Jubayer al hasan. (jubayer.hasan1991@gmail.com)


(function($) {
    "use strict";
    
    
    $(document).on ('ready', function (){
        
        // -------------------- Navigation Scroll
        $(window).on('scroll', function (){   
          var sticky = $('.main-menu-wrapper'),
          scroll = $(window).scrollTop();
          if (scroll >= 190) sticky.addClass('fixed');
          else sticky.removeClass('fixed');

        });


        // ------------------------------- WOW Animation 
        var wow = new WOW({
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       80,          // distance to the element when triggering the animation (default is 0)
            mobile:       true,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
          });
          wow.init();


        
        // -------------------- Remove Placeholder When Focus Or Click
        $("input,textarea").each( function(){
            $(this).data('holder',$(this).attr('placeholder'));
            $(this).on('focusin', function() {
                $(this).attr('placeholder','');
            });
            $(this).on('focusout', function() {
                $(this).attr('placeholder',$(this).data('holder'));
            });     
        });
        
        // -------------------- From Bottom to Top Button
            //Check to see if the window is top if not then display button
        $(window).on('scroll', function (){
          if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
          } else {
            $('.scroll-top').fadeOut();
          }
        });
            //Click event to scroll to top
        $('.scroll-top').on('click', function() {
          $('html, body').animate({scrollTop : 0},1500);
          return false;
        });


        // ------------------------------ Language Switcher
         var plang = $('#polyglotLanguageSwitcher');
         if (plang.length) {
              plang.polyglotLanguageSwitcher({
                effect: 'fade',
                        testMode: true,
                        onChange: function(evt){
                            alert("The selected language is: "+evt.selectedItem);
                        }
                      //      ,afterLoad: function(evt){
                      //          alert("The selected language has been loaded");
                      //      },
                      //      beforeOpen: function(evt){
                      //          alert("before open");
                      //      },
                      //      afterOpen: function(evt){
                      //          alert("after open");
                      //      },
                      //      beforeClose: function(evt){
                      //          alert("before close");
                      //      },
                      //      afterClose: function(evt){
                      //          alert("after close");
                      //      }
              });
          };


        // ---------------------------- Greeting Message
        var thehours = new Date().getHours();
        var themessage;
        var morning = ('Good morning');
        var afternoon = ('Good afternoon');
        var evening = ('Good evening');

        if (thehours >= 0 && thehours < 12) {
          themessage = morning; 

        } else if (thehours >= 12 && thehours < 17) {
          themessage = afternoon;

        } else if (thehours >= 17 && thehours < 24) {
          themessage = evening;
        }
        $('.greeting').append(themessage);


        // --------------------------- Theme Main Banner Slider One
        var banner = $(".banner-one");
        if (banner.length) {
          banner.camera({ //here I declared some settings, the height and the presence of the thumbnails 
            height: '710px',
            pagination: false,
            navigation: true,
            thumbnails: false,
            playPause: false,
            pauseOnClick: false,
            autoPlay:true,
            hover: false,
            overlayer: true,
            loader: 'none',
            minHeight: '650px',
            time: 400000,
          });
        };

        
        // --------------------------- Theme Main Banner Slider Two
        var bannertwo = $(".banner-two");
        if (bannertwo.length) {
          bannertwo.camera({ //here I declared some settings, the height and the presence of the thumbnails 
            height: '900px',
            pagination: false,
            navigation: true,
            thumbnails: false,
            playPause: false,
            pauseOnClick: false,
            autoPlay:true,
            hover: false,
            overlayer: true,
            loader: 'none',
            minHeight: '650px',
            time: 400000,
          });
        };




        // ----------------------------- Counter Function
        var timer = $('.timer');
        if(timer.length) {
            timer.appear(function () {
              timer.countTo();
          })
        }


         // ------------------------------ MixitUp 
         if ($("#mixitUp-item").length) {
            $("#mixitUp-item").mixItUp()
          };



        // ------------------------------- Testimonial Slider
        var tSlider = $ (".testimonial-slider");
        if(tSlider.length) {
            tSlider.owlCarousel({
              loop:true,
              nav:false,
              dots:true,
              autoplay:true,
              margin:30,
              autoplayTimeout:4000,
              autoplaySpeed:1000,
              lazyLoad:true,
              responsive:{
                    0:{
                        items:1
                    },
                    551:{
                        items:1
                    },
                    992:{
                        items:2
                    }
                },
          })
        }


        // ------------------------------- Testimonial Slider Two
        var tSlider = $ (".client-slider-two");
        if(tSlider.length) {
            tSlider.owlCarousel({
              loop:true,
              nav:false,
              dots:true,
              autoplay:true,
              autoplayTimeout:4000,
              autoplaySpeed:1000,
              lazyLoad:true,
              responsive:{
                    0:{
                        items:1
                    },
                    551:{
                        items:1
                    },
                    992:{
                        items:2
                    }
                },
          })
        }

        // ------------------------------- latest News Slider
        var nSlider = $ (".news-slider");
        if(nSlider.length) {
            nSlider.owlCarousel({
              loop:true,
              nav:false,
              dots:false,
              autoplay:true,
              margin:30,
              autoplayTimeout:4000,
              autoplaySpeed:1000,
              lazyLoad:true,
              responsive:{
                    0:{
                        items:1
                    },
                    551:{
                        items:2
                    },
                    992:{
                        items:3
                    }
                },
          })
        }


        // -------------------------------  Related Project Slider
        var rpSlider = $ (".related-project-slider");
        if(rpSlider.length) {
            rpSlider.owlCarousel({
              loop:true,
              nav:true,
              navText: ["",""],
              dots:false,
              autoplay:true,
              autoplayTimeout:4000,
              smartSpeed:1000,
              navSpeed:1200,
              lazyLoad:true,
              responsive:{
                    0:{
                        items:1
                    },
                    551:{
                        items:2
                    },
                    992:{
                        items:3
                    }
                },
          })
        }


        // --------------------------------- Contact Form Validation
          if($('.form-validation').length){
            $('.form-validation').validate({ // initialize the plugin
              rules: {
                name: {
                  required: true
                },
                email: {
                  required: true,
                  email: true
                },
                sub: {
                  required: true
                },
                message: {
                  required: true
                }
              },
            submitHandler: function(form) {
              $(form).ajaxSubmit({
                success: function() {
                  $('.form-validation :input').attr('disabled', 'disabled');
                  $('.form-validation').fadeTo( "slow", 1, function() {
                      $(this).find(':input').attr('disabled', 'disabled');
                      $(this).find('label').css('cursor','default');
                      $('#alert-success').fadeIn();
                    });
                  },
                  error: function() {
                    $('.form-validation').fadeTo( "slow", 1, function() {
                      $('#alert-error').fadeIn();
                    });
                  }
                });
              }
            });
          }



          // ---------------------------------- Validation Alert
          var closeButton = $ (".closeAlert");
            if(closeButton.length) {
                closeButton.on('click', function(){
                  $(".alert-wrapper").fadeOut();
                });
                closeButton.on('click', function(){
                  $(".alert-wrapper").fadeOut();
                })
            }


          // -------------------------------- Accordion Panel
          if ($('.theme-accordion > .panel').length) {
            $('.theme-accordion > .panel').on('show.bs.collapse', function (e) {
                  var heading = $(this).find('.panel-heading');
                  heading.addClass("active-panel");
                  
            });
            $('.theme-accordion > .panel').on('hidden.bs.collapse', function (e) {
                var heading = $(this).find('.panel-heading');
                  heading.removeClass("active-panel");
                  //setProgressBar(heading.get(0).id);
            });
            $('.panel-heading a').on('click',function(e){
                if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
                    e.stopPropagation();
                }
            });
          }



        $("#wrapped").on('submit', function (event) {
          $("#full-overlay").css('display', 'flex');
          var formData = {
            stare_inmatriculare: $("#stare_inmatriculare").val(),
            numar_inmatriculare: $("#numar_inmatriculare").val(),
            tip_vehicul: $("#tip_vehicul").val(),
            marca: $("#marca").val(),
            model: $("#model").val(),
            combustibil: $("#combustibil").val(),
            utilizare: $("#utilizare").val(),
            masa_maxima: $("#masa_maxima").val(),
            cap_cil: $("#cap_cil").val(),
            putere: $("#putere").val(),
            nr_loc: $("#nr_loc").val(),
            serie_civ: $("#serie_civ").val(),
            sasiu: $("#sasiu").val(),
            an_fab: $("#an_fab").val(),
            persoana: $("#persoana").val(),
            nmume_proprietar: $("#nmume_proprietar").val(),
            cnp_proprietar: $("#cnp_proprietar").val(),
            ci_proprietar: $("#ci_proprietar").val(),
            judet: $("#judet").val(),
            strada_proprietar: $("#strada_proprietar").val(),
            bloc_proprietar: $("#bloc_proprietar").val(),
            etaj_proprietar: $("#etaj_proprietar").val(),
            reduceri: $("#reduceri").val(),
            prenume_proprietar: $("#prenume_proprietar").val(),
            an_permis_proprietar: $("#an_permis_proprietar").val(),
            nr_ci_proprietar: $("#nr_ci_proprietar").val(),
            localitate: $("#localitate").val(),
            numar_adresa_proprietar: $("#numar_adresa_proprietar").val(),
            scara_proprietar: $("#scara_proprietar").val(),
            apartament_proprietar: $("#apartament_proprietar").val(),
            soferul_acelasi: $("#soferul_acelasi").val(),
            nume_conducator: $("#nume_conducator").val(),
            prenume_conducator: $("#prenume_conducator").val(),
            ci_conducator: $("#ci_conducator").val(),
            nr_ci_conducatorr: $("#nr_ci_conducatorr").val(),
            cnp_conducator: $("#cnp_conducator").val(),
            data_rca: $("#data_rca").val(),
            nume_livrare: $("#nume_livrare").val(),
            prenume_livrare: $("#prenume_livrare").val(),
            adresa_livrare: $("#adresa_livrare").val(),
            email_livrare: $("#email_livrare").val(),
            telefon_livrare: $("#telefon_livrare").val(),
            termeni_conditii: $("#termeni_conditii").val(),
            societate: $("#societate").val(),
            valabilitate: $("#valabilitate").val(),
            cui: $("#cui").val(),
            asigurator: $("#asigurator").val(),
            caen: $("#caen").val(),
          };

          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            // url: "/cerere",
            url: "/platforma/public/cerere",
            data: formData,
            encode: true,
          }).done(function (data) {
            console.log(data);
            $("#full-overlay").css('display', 'none');
            $("#replaceble").empty().append(data.view);
          });
          event.preventDefault();
        });

        
    });

    
    $(window).on ('load', function (){ // makes sure the whole site is loaded

        // -------------------- Site Preloader
        $('#loader').fadeOut(); // will first fade out the loading animation
        $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
        getVehicleBrands();
        getVehicleActivities();
        getVehicleCategories();
        getCompanyCAEN();
    })

    function getVehicleBrands() {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: "/platforma/public/marci",
        // url: "/marci",
        encode: true,
      }).done(function (data) {
        let parsed = JSON.parse(data);
        let brands = Object.entries(parsed)
        if(brands.length){
          $('#marca').empty();
          $('#marca').append(new Option("Marca", ""));
          brands.map(brand => {
            $('#marca').append(new Option(brand[0], brand[1]));
          });
        }
      });
    }

    function getVehicleActivities() {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: "/platforma/public/activitati",
        // url: "/activitati",
        encode: true,
      }).done(function (data) {
        let parsed = JSON.parse(data);
        let activitati = Object.entries(parsed)
        if(activitati.length){
          $('#utilizare').empty();
          $('#utilizare').append(new Option("Utilizare", ""));
          activitati.map(activitate => {
            $('#utilizare').append(new Option(activitate[0], activitate[1]));
          });
        }
      });
    }

    function getVehicleCategories() {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: "/platforma/public/categorii",
        // url: "/categorii",
        encode: true,
      }).done(function (data) {
        let parsed = JSON.parse(data);
        let categorii = Object.entries(parsed)
        if(categorii.length){
          $('#tip_vehicul').empty();
          $('#tip_vehicul').append(new Option("Tip vehicul", ""));
          categorii.map(categorie => {
            $('#tip_vehicul').append(new Option(categorie[0], categorie[1]));
          });
        }
      });
    }

    function getCompanyCAEN() {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: "/platforma/public/caen",
        // url: "/caen",
        encode: true,
      }).done(function (data) {
        let parsed = JSON.parse(data);
        let coduri = Object.entries(parsed)
        if(coduri.length){
          $('#caen').empty();
          $('#caen').append(new Option("Cod CAEN", ""));
          coduri.map(cod => {
            $('#caen').append(new Option(cod[1], cod[0]));
          });
        }
      });
    }


    $("#sasiu").on('change', function() {
      checkRegex("#sasiu", /^([a-zA-Z0-9]{13,17})$/, "Seria sasiu trebuie sa contina 17 caractere")
    });

    function checkRegex(element, regex, error_message) {
      let val = $(element).val();
      // console.log(regex.test(val));
      if(!regex.test(val)){
        $(element).removeClass('valid');
        $(element).addClass('error');
        if(!$(element).parent().has( ".cst-error" ).length)
        $(element).parent().append('<span for="sasiu" class="cst-error" style="display: block;">'+ error_message + '</span>')
      } else {
        $(".cst-error").remove();
        $(element).removeClass('error');
        $(element).addClass('valid');
        console.log("inlaturam")
      }
    }

    $("#persoana").on('change', function() {
      let val = $("#persoana").val();
      if(val === "pj" || val === "leasing") {
        $("#nmume_proprietar").remove();
        $("#cnp_proprietar").remove();
        $("#ci_proprietar").remove();
        $("#prenume_proprietar").remove();
        $("#an_permis_proprietar").remove();
        $("#nr_ci_proprietar").remove();
        $("#societate").remove();
        $("#caen").remove();
        $("#cui").remove();
        $("#telefon_fix").remove();
        
        getCompanyCAEN();

        $("#societate-wrapper").append('<input type="text" name="societate" id="societate" class="required form-control" placeholder="Denumire societate">');
        $("#cui-wrapper").append('<input type="text" name="cui" id="cui" class="required form-control" placeholder="CUI">');
        $("#caen-wrapper").append('<div class="styled-select"><select class="required" name="caen" id="caen"><option value="" selected>Cod CAEN</option></select></div>');
        $("#telefon_fix-wrapper").append('<input type="text" name="telefon_fix" id="telefon_fix" class="required form-control" placeholder="Telefon Fix">');
      } else {
        $("#nmume_proprietar").remove();
        $("#cnp_proprietar").remove();
        $("#ci_proprietar").remove();
        $("#prenume_proprietar").remove();
        $("#an_permis_proprietar").remove();
        $("#nr_ci_proprietar").remove();
        $("#societate").remove();
        $("#caen").remove();
        $("#cui").remove();


        $("#nmume_proprietar-wrapper").append('<input type="text" name="nmume_proprietar" id="nmume_proprietar" class="required form-control" placeholder="Nume">');
        $("#cnp_proprietar-wrapper").append('<input type="text" name="cnp_proprietar" id="cnp_proprietar" class="required form-control" placeholder="CNP">');
        $("#ci_proprietar-wrapper").append('<input type="text" name="ci_proprietar" id="ci_proprietar" class="required form-control" placeholder="Serie CI">');
        $("#prenume_proprietar-wrapper").append('<input type="text" name="prenume_proprietar" id="prenume_proprietar" class="required form-control" placeholder="Prenume">');
        $("#an_permis_proprietar-wrapper").append('<input type="date" name="an_permis_proprietar" id="an_permis_proprietar" class="required form-control" placeholder="Data obtinere permis">');
        $("#nr_ci_proprietar-wrapper").append('<input type="text" name="nr_ci_proprietar" id="nr_ci_proprietar" class="required form-control" placeholder="Numar CI">');
      }
      console.log(val)
    });

    

    $("#soferul_acelasi").on('change', function() { 
      if($("#soferul_acelasi").is(':checked')){
        $("#nume_conducator").val($('#nmume_proprietar').val());
        $("#prenume_conducator").val($('#prenume_proprietar').val());
        $("#ci_conducator").val($('#ci_proprietar').val());
        $("#nr_ci_conducatorr").val($('#nr_ci_proprietar').val());
        $("#cnp_conducator").val($('#cnp_proprietar').val());
      } else {
        $("#nume_conducator").val('');
        $("#prenume_conducator").val('');
        $("#ci_conducator").val('');
        $("#nr_ci_conducatorr").val('');
        $("#cnp_conducator").val('');
      }
    });

    $("#judet").on('change', function() {
      let val = $("#judet").val();
      // $.getJSON("/js/localitati.json", function(obiect) {
      $.getJSON("/platforma/public/js/localitati.json", function(obiect) {
        let selectat = obiect.judete.filter(judet =>judet.nume === val)[0].localitati;
        if(selectat){
          $('#localitate').empty();
          selectat.map(localitate => {
            $('#localitate').append(new Option(localitate.nume, localitate.nume));
            // console.log(localitate.nume)
          });
        }
      });
    });


    $("#fara-revenire").on('click', function() {
      $("#revenire").css('display', 'none');
      $("#wizard_container").css('display', 'block');
    });

    $("#test-revenire").on('click', function() {
      $("#revenire").css('display', 'none');
      $("#wizard_container").css('display', 'block');
      let nr_mat = $('#nr_mat').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: "/platforma/public/vehicul/"+nr_mat,
        // url: "/vehicul/"+nr_mat,
        encode: true,
      }).done(function (data) {
        // console.log(data);
        $("#stare_inmatriculare").val("Inmatriculat");
        $("#an_fab").val(data.an_fabricatie);
        $("#cap_cil").val(data.capacitatea_cilindrica);
        $("#combustibil").val(data.carburant);
        $("#marca").val(data.marca);
        $("#masa_maxima").val(data.masa_admia);
        $("#model").val(data.model);
        $("#numar_inmatriculare").val(data.nr_inmatriculare);
        $("#nr_loc").val(data.nr_locuri);
        $("#putere").val(data.putere_motor);
        $("#serie_civ").val(data.serie_civ);
        $("#sasiu").val(data.serie_sasiu);
        $("#tip_vehicul").val(data.tip_vehicul);
        $("#utilizare").val(data.utilizare);
        // let parsed = JSON.parse(data);
      });
    });
})(jQuery)