// js Document

    // Created on   : 07/06/2018.
    // Theme Name   : Conis.
    // Description  : Conis - Business And Finance HTML Template
    // Version      : 1.0.
    // Author       : @CreativeGigs.
    // Developed by : Jubayer al hasan. (jubayer.hasan1991@gmail.com)


(function($) {
    "use strict";
    var site_url = "http://127.0.0.1:8000";
    if(window.location.origin == 'https://goasig.ro'){
      site_url = "https://goasig.ro/platforma/public";
    }

    
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
            console.log($('.form-validation'));
            $('.form-validation').validate({ // initialize the plugin
              rules: {
                numar_inmatriculare: {
                  required: true,
                  pattern: !/^([a-zA-Z]{1,2}[0-9]{2,3}[a-zA-Z]{3})$/,
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
            submitHandler: function(form, event) {
              // console.log(event);
              // event.preventDefault();
              // sendForm(form);
              // $(form).ajaxSubmit({
              //   success: function() {
              //     $('.form-validation :input').attr('disabled', 'disabled');
              //     $('.form-validation').fadeTo( "slow", 1, function() {
              //         $(this).find(':input').attr('disabled', 'disabled');
              //         $(this).find('label').css('cursor','default');
              //         $('#alert-success').fadeIn();
              //       });
              //     },
              //     error: function() {
              //       $('.form-validation').fadeTo( "slow", 1, function() {
              //         $('#alert-error').fadeIn();
              //       });
              //     }
              //   });
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


        function replaceOcr(str) {
          var tmp = str;
          var diac = ['â','Â','î','Î','ş','Ş','ţ','Ţ'];
          var cor = ['a','A','i','I','s','S','t' ,'T'];
          diac.map((caracter, index) => {
            tmp = tmp.replace(caracter, cor[index]);
          })
          return tmp;
        }

        // function sendForm (event) {
        $("#wrapped").on('submit', async function (event) {
          $("#full-overlay").css('display', 'flex');
          var cont;
          if($("#creaza_cont").is(':checked')){
            cont = 1;
          } else {
            cont = 0;
          }

          var judet= replaceOcr($("#judet").val());
          var localitate= replaceOcr($("#localitate").val());
          var valabilitate = $("#valabilitate").val();

          

          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            // url: "/platforma/public/coduri/"+judet+"/"+localitate,
            url: site_url+"/coduri/"+judet+"/"+localitate,
            encode: true,
          }).done(function (coduri) {
            // console.log(coduri);
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
              parola : $("#parola").val(),
              decontare_directa: 'false',
              creaza_cont: cont,
              cod_postal: coduri.cod_postal,
              cod_siruta: coduri.cod_siruta,
              companie_tip: $("#companie-tip").val(),
              companie_activitate: $("#companie-activitate").val(),
            };

            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: "POST",
              url: site_url+"/create-acc",
              // url: "/platforma/public/ajaxify",
              data: formData,
              encode: true,
            })
  
            $("#replaceble").empty();
            $("#replaceble").append('<div class="switch-dd">\
            <h2>Decontare directa?</h2>\
            <label class="switch" id="switch-dd-slider">\
            <input type="checkbox" id="switch-dd" name="switch-dd" />\
              <span class="slider round"></span>\
            </label>\
            </div>');
            getFaraDecontare(formData, valabilitate);
            // $("#replaceble").append('<div class="container container-ndd">\
            //     <div class="row justify-content-center">\
            //             <div class="card card-oferte  custom-card-view">\
            //                 <div class="card-header ">Oferte disponibile</div>\
            //                 <div class="card-body">\
            //                 <table>\
            //                     <thead>\
            //                         <tr>\
            //                             <th>Asigurator</th>\
            //                             <th>Beneficii</th>\
            //                             <th>Valabilitate ('+valabilitate+' luni)</th>\
            //                             <th>Valabilitate (12 luni)</th>\
            //                         </tr>\
            //                     </thead>\
            //                     <tbody id="to-append"><tr id="plc"><td colspan=4><div class="placeholder"></div></td></tr>');
  
            // var asiguratori = ['city', 'groupama', 'omniasig','generali', 'grawe'];
            // asiguratori.map((asigurator, index) => {
            //   formData.asigurator = asigurator;
            //   var t0 = performance.now()

            //   $.ajax({
            //     headers: {
            //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     type: "POST",
            //     url: "/ajaxify",
            //     // url: "/platforma/public/ajaxify",
            //     data: formData,
            //     encode: true,
            //   }).done(function (data) {
            //     // console.log(asigurator, ' = ',data);
            //     // var html = '<tr><td><img class="logo-asigurator" src="/platforma/public/images/'+asigurator+'.png" />\
            //     var html = '<tr><td><img class="logo-asigurator" src="/images/'+asigurator+'.png" />\
            //     </td><td>\
            //       <div class="clasa-bonus">Clasa BM: </div>\
            //       <div class="carte-verde">Tari excluse carte verde: ' + data.oferte[0].CarteaVerde +'</div>\
            //       <div class="comision">Comision inclus '+ asigurator +': '+ data.oferte[0].ComisionProcent +'</div>\
            //     </td>';
            //     data.oferte.map(oferta=> {
            //       if(oferta.Eroare) {
            //         html +='<td>  </td>';
            //       } else {
            //         html +='<td><div class="actiuni"><a class="buton" href="'+ oferta.LinkPlata+'">\
            //             <i class="fa fa-shopping-cart" aria-hidden="true"></i>\
            //             <span>'+oferta.Valoare+' lei</span>\
            //             </a></div>\
            //           </td>';
            //       }
            //       var t1 = performance.now()
            //     console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.")
                  
            //     });
            //     html += '</tr>';
            //     // console.log(html)
            //     $("#plc").empty();
            //     $("#plc").remove();
            //     $("#full-overlay").css('display', 'none');
            //     $("#to-append").append(html);
            //     $("#to-append").append('<tr id="plc"><td colspan=4><div class="placeholder"></div></td></tr>');
            //     if(index == asiguratori.length-1) {
            //       $("#plc").remove();
            //       getDecontareDirecta(formData, valabilitate);
            //     }
            //   });
            // })
            //decontare directa+


          });

          event.preventDefault();

          
        // }
        });
        
    });

    function getFaraDecontare(formData, valabilitate) {
      $("#replaceble").append('<div class="container container-ndd">\
          <div class="row justify-content-center">\
            <div class="card card-oferte  custom-card-view">\
                <div class="card-header ">Oferte disponibile</div>\
                <div class="card-body">\
                <table>\
                    <thead>\
                        <tr>\
                            <th>Asigurator</th>\
                            <th>Beneficii</th>\
                            <th>Valabilitate ('+valabilitate+' luni)</th>\
                            <th>Valabilitate (12 luni)</th>\
                        </tr>\
                    </thead>\
                    <tbody id="to-append"><tr id="plc"><td colspan=4><div class="placeholder"></div></td></tr>');
        $("#replaceble").append('<div class="container container-dd" style="display: none;">\
        <div class="row justify-content-center">\
          <div class="card card-oferte  custom-card-view">\
            <div class="card-header ">Oferte disponibile - decontare directa</div>\
            <div class="card-body">\
            <table>\
                <thead>\
                    <tr>\
                        <th>Asigurator</th>\
                        <th>Beneficii</th>\
                        <th>Valabilitate ('+valabilitate+' luni)</th>\
                        <th>Valabilitate (12 luni)</th>\
                    </tr>\
                </thead>\
                <tbody id="to-appenddd"><tr id="plcdd"><td colspan=4><div class="placeholder"></div></td></tr>');
            var asiguratori = ['groupama', 'city', 'grawe', 'generali', 'omniasig'];
            asiguratori.map((asigurator, index) => {
              formData.asigurator = asigurator;
              var t0 = performance.now()

              $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: site_url+"/ajaxify",
                // url: "/platforma/public/ajaxify",
                data: formData,
                encode: true,
              }).done(function (data) {
                console.log(asigurator, ' = ',data);
                // var html = '<tr><td><img class="logo-asigurator" src="/platforma/public/images/'+asigurator+'.png" />\
                var html = '<tr><td><img class="logo-asigurator" src="'+site_url+'/images/'+asigurator+'.png" />\
                </td><td class="detalii">\
                <div class="tooltip-wrapper">\
                  <div class="clasa-bonus">Clasa BM:' + data.oferte[0].ClasaBM +'</div>\
                  <div class="cst-tooltip-trigger">\
                  <i class="fa fa-info" aria-hidden="true"></i>\
                  <div class="cust-tooltip">\
                  <div class="carte-verde">Tari excluse carte verde: ' + data.oferte[0].CarteaVerde +'</div>\
                  <div class="comision">Comision inclus '+ asigurator +': '+ data.oferte[0].ComisionProcent +'</div>\
                  </div>\
                  </div>\
                  </div>\
                  </td>';
                data.oferte.map(oferta=> {
                  if(oferta.Eroare) {
                    html +='<td>  </td>';
                  } else {
                    html +='<td><div class="actiuni"><a class="buton" href="'+ oferta.LinkPlata+'">\
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>\
                        <span>'+oferta.Valoare+' lei</span>\
                        </a></div>\
                      </td>';
                  }
                  var t1 = performance.now()
                console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.")
                  
                });
                html += '</tr>';
                // console.log(html)
                $("#plc").empty();
                $("#plc").remove();
                $("#full-overlay").css('display', 'none');
                $("#to-append").append(html);
                $("#to-append").append('<tr id="plc"><td colspan=4><div class="placeholder"></div></td></tr>');
                if(index == asiguratori.length-1) {
                  $("#plc").remove();
                  getDecontareDirecta(formData, valabilitate);
                }
              });
            })
    }

    function getDecontareDirecta(formData, valabilitate) {
      var asiguratori = ['groupama', 'city', 'grawe', 'generali', 'omniasig'];
      

            formData.decontare_directa = 'true';
            asiguratori.map((asigurator, index) => {
              formData.asigurator = asigurator;
              $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: site_url+"/ajaxify",
                // url: "/platforma/public/ajaxify",
                data: formData,
                encode: true,
              }).done(function (data) {
                console.log(asigurator, ' = ',data);
                //var html = '<tr><td><img class="logo-asigurator" src="/platforma/public/images/'+asigurator+'.png" />\
                var html = '<tr><td><img class="logo-asigurator" src="'+site_url+'/images/'+asigurator+'.png" />\
                </td><td class="detalii">\
                <div class="tooltip-wrapper">\
                  <div class="clasa-bonus">Clasa BM:' + data.oferte[0].ClasaBM +'</div>\
                  <div class="cst-tooltip-trigger">\
                  <i class="fa fa-info" aria-hidden="true"></i>\
                  <div class="cust-tooltip">\
                  <div class="carte-verde">Tari excluse carte verde: ' + data.oferte[0].CarteaVerde +'</div>\
                  <div class="comision">Comision inclus '+ asigurator +': '+ data.oferte[0].ComisionProcent +'</div>\
                  </div>\
                  </div>\
                  </div>\
                  </td>';
                data.oferte.map(oferta=> {
                  html +='<td><div class="actiuni"><a class="buton" href="'+ oferta.LinkPlata+'">\
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>\
                    <span>'+oferta.Valoare+' lei</span>\
                    </a></div>\
                  </td>'
                });
                html += '</tr>';
                // console.log(html)
                $("#plcdd").empty();
                $("#plcdd").remove();
                $("#to-appenddd").append(html);
                $("#to-appenddd").append('<tr id="plcdd"><td colspan=4><div class="placeholder"></div></td></tr>');
                if(index == asiguratori.length-1) {
                  $("#plcdd").remove();
                }
              });
            });
            $("#replaceble").append('</tbody></table></div></div></div></div>');
    }

    
    $(window).on ('load', function (){ // makes sure the whole site is loaded

        // -------------------- Site Preloader
        $('#loader').fadeOut(); // will first fade out the loading animation
        $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
        // getVehicleCategories();
        // getVehicleBrands();
        // getVehicleActivities();
        // getCompanyCAEN();
    })

    function getVehicleBrands() {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        // url: "/platforma/public/marci",
        url: site_url+"/marci",
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
        // url: "/platforma/public/activitati",
        url: site_url+"/activitati",
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
        // url: "/platforma/public/categorii",
        url: site_url+"/categorii",
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
        // url: "/platforma/public/caen",
        url: site_url+"/caen",
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
        $("#companie-activitate-wrapper").empty();
        $('#caen-wrapper').empty();
        
        getCompanyCAEN();

        if ( !$('#societate-wrapper').children().length > 0 ) {
          $("#societate-wrapper").append('<input type="text" name="societate" id="societate" class="required form-control" placeholder="Denumire societate">');
        }
        if ( !$('#cui-wrapper').children().length > 0 ) {
          $("#cui-wrapper").append('<input type="text" name="cui" id="cui" class="required form-control" placeholder="CUI">');
        }
        if ( !$('#caen-wrapper').children().length > 0 ) {
          $("#caen-wrapper").append('<div class="styled-select"><select class="required" name="caen" id="caen"><option value="" selected>Cod CAEN</option></select></div>');
        }
        if ( !$('#companie-tip-wrapper').children().length > 0 ) {
          $("#companie-tip-wrapper").append('<div class="styled-select"><select class="required" name="companie-tip" id="companie-tip"><option value="">Tip companie</option><option value="1">SC nefinanciare – SA</option>\
        <option value="2">SC nefinanciare – SRL</option>\
        <option value="3">SC nefinanciare – PFA</option>\
        <option value="4">SC nefinanciare – PFI</option>\
        <option value="5">Alte SC nefinanciare</option>\
        <option value="6">Banci si cooperative de credit</option>\
        <option value="7">Intermediari financiari – Leasing</option>\
        <option value="8">Alti intermediari financiari</option>\
        <option value="9">Institutii Guvernamentale</option>\
        <option value="1">Regii autonome</option></select></div>');
        }
        if ( !$('#companie-activitate-wrapper').children().length > 0 ) {
          $("#companie-activitate-wrapper").append('<div class="styled-select"><select class="required" name="companie-activitate" id="companie-activitate"><option value="">Activitate companie</option><option value="1">Agricultura/silvicultura/zootehnie</option><option value="2">Comert</option><option value="3">Ind. Alimentara, Morarit si Panificatie</option><option value="4">Ind. Materiale de constructii</option><option value="5">Ind. Textila</option><option value="6">Ind. Chimica</option><option value="7">Ind. Energetica</option><option value="8">Ind Transporturilor</option><option value="9">Media - Presa, TV</option><option value="10">Ind prelucrare lemn</option><option value="11">Curierarat, Distributie,</option><option value="12">Turism</option><option value="13">Arta, Cultura, religie</option><option value="14">Servicii Financiar-bancare, Asigurari</option><option value="15">Justitie</option><option value="16">Armata, Ordine Publica, Servicii speciale</option><option value="17">Asistenta Medicala, Sanatate, Servicii Sociale</option><option value="18">Industrie IT</option><option value="19">Sport</option><option value="20">Aviatie, transport aerian</option><option value="22">Industria extractiva</option><option value="23">Industria prelucratoare</option><option value="24">Prod. energie, gaze, apa</option><option value="25">Distrib.apei, salubritate</option><option value="26">Tranzactii imobiliare</option><option value="27">Invatamant</option><option value="28">Activ.stiintifice/tehnice</option><option value="29">Servicii admin. si suport</option><option value="30">Serv.pt. gospod. private</option><option value="31">Organiz.extrateritoriale</option><option value="32">Transp. marfa intern</option><option value="33">Transp. marfa int/extern</option><option value="34">Transp. pers. intern</option><option value="35">Transp. pers. urban</option><option value="36">Transp. pers. int/extern</option><option value="37">Transp. taxi/maxi-taxi</option><option value="38">Serv. de interv. si paza</option><option value="999">Altul</option></select></div>');
        }
        if ( !$('#telefon_fix-wrapper').children().length > 0 ) {
          $("#telefon_fix-wrapper").append('<input type="text" name="telefon_fix" id="telefon_fix" class="required form-control" placeholder="Telefon Fix">');
        }
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
        $("#companie-tip").remove();
        $("#telefon_fix").remove();

        $("#societate-wrapper").empty();
        $("#cui-wrapper").empty();
        $("#caen-wrapper").empty();
        $("#companie-tip-wrapper").empty();
        $("#companie-activitate-wrapper").empty();
        

        $("#nmume_proprietar-wrapper").append('<input type="text" name="nmume_proprietar" id="nmume_proprietar" class="required form-control" placeholder="Nume">');
        $("#cnp_proprietar-wrapper").append('<input type="text" name="cnp_proprietar" id="cnp_proprietar" class="cnp required form-control" placeholder="CNP">');
        $("#ci_proprietar-wrapper").append('<input type="text" name="ci_proprietar" id="ci_proprietar" class="required form-control" placeholder="Serie CI">');
        $("#prenume_proprietar-wrapper").append('<input type="text" name="prenume_proprietar" id="prenume_proprietar" class="required form-control" placeholder="Prenume">');
        $("#an_permis_proprietar-wrapper").append('<input type="date" name="an_permis_proprietar" id="an_permis_proprietar" class="required form-control" placeholder="Data obtinere permis">');
        $("#nr_ci_proprietar-wrapper").append('<input type="text" name="nr_ci_proprietar" id="nr_ci_proprietar" class="required form-control" placeholder="Numar CI">');
      }
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
      incarcaLocalitati($("#judet").val());
    });

    function incarcaLocalitati(judet = '', sel_localitate ='') {
      let val;
      if(judet.length) {
        val = judet
      } else {
        $("#judet").val();

      }
      $.getJSON(site_url+"/js/localitati.json", function(obiect) {
      // $.getJSON("/platforma/public/js/localitati.json", function(obiect) {
        let selectat = obiect.judete.filter(judet =>judet.nume === val)[0].localitati;
        if(selectat){
          $('#localitate').empty();
          selectat.map(localitate => {
            // console.log('selectata: ', sel_localitate, ' la rand: ', localitate.nume, '\n');
            // console.log(sel_localitate == localitate.nume);
            if(sel_localitate == localitate.nume) {
              $('#localitate').append(new Option(localitate.nume, localitate.nume, true, true));
            } else {
              $('#localitate').append(new Option(localitate.nume, localitate.nume));
            }
            // console.log(localitate.nume)
          });
        }
      });
    }


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
        // url: "/platforma/public/vehicul/"+nr_mat,
        url: site_url+"/vehicul/"+nr_mat,
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

    $("#creaza_cont").on('click', function() {
      if($("#creaza_cont").is(':checked')){
        $("#parola-wrapper").css('display', 'block');
      } else {
        $("#parola-wrapper").css('display', 'none');
        $("#parola-wrapper").val('');
      }
    });

    $("#vehicule-salvate").on('change', function() {
      $(".user-initial-select").css('display', 'none');
      $("#wizard_container").css('display', 'block');
      let nr_mat = $('#vehicule-salvate').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        // url: "/platforma/public/vehicul/"+nr_mat,
        url: site_url+"/vehicul/"+nr_mat,
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

    $('#vehicul-nou').on('click', function(){
      $(".user-initial-select").css('display', 'none');
      $("#wizard_container").css('display', 'block');
      $("#stare_inmatriculare").val('');
      $("#an_fab").val('');
      $("#cap_cil").val('');
      $("#combustibil").val('');
      $("#marca").val('');
      $("#masa_maxima").val('');
      $("#model").val('');
      $("#numar_inmatriculare").val('');
      $("#nr_loc").val('');
      $("#putere").val('');
      $("#serie_civ").val('');
      $("#sasiu").val('');
      $("#tip_vehicul").val('');
      $("#utilizare").val('');
    });


    $("#proprietari-salvati").on('change', function() {
      $(".user-initial-select").css('display', 'none');
      $("#wizard_container").css('display', 'block');
      let cod_unic = $('#proprietari-salvati').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        // url: "/platforma/public/proprietar/"+cod_unic,
        url: site_url+"/proprietar/"+cod_unic,
        encode: true,
      }).done(function (data) {
        // console.log(data);
        $("#persoana").val(data.tip_persoana);
        $("#cnp_proprietar").val(data.cod_unic);
        $("#ci_proprietar").val(data.serie_ci);
        $("#judet").val(data.judet);
        incarcaLocalitati(data.judet, data.localitate);
        $("#strada_proprietar").val(data.strada);
        $("#bloc_proprietar").val(data.bloc);
        $("#etaj_proprietar").val(data.etaj);
        $("#reduceri").val(data.reduceri);
        $("#nmume_proprietar").val(data.nume);
        $("#prenume_proprietar").val(data.prenume);
        $("#an_permis_proprietar").val(data.data_permis);
        $("#nr_ci_proprietar").val(data.nr_ci);
        $("#localitate").val(data.localitate);
        $("#numar_adresa_proprietar").val(data.numar);
        $("#scara_proprietar").val(data.scara);
        $("#apartament_proprietar").val(data.apartament);
        $("#forward").trigger( "click" );
        // let parsed = JSON.parse(data);
      });
    });

    $('#proprietar-nou').on('click', function(){
        $("#persoana").val('');
        $("#cnp_proprietar").val('');
        $("#ci_proprietar").val('');
        $("#judet").val('');
        $("#strada_proprietar").val('');
        $("#bloc_proprietar").val('');
        $("#etaj_proprietar").val('');
        $("#reduceri").val('');
        $("#nmume_proprietar").val('');
        $("#prenume_proprietar").val('');
        $("#an_permis_proprietar").val('');
        $("#nr_ci_proprietar").val('');
        $("#localitate").val('');
        $("#numar_adresa_proprietar").val('');
        $("#scara_proprietar").val('');
        $("#apartament_proprietar").val('');
        $("#forward").trigger( "click" );
    });

    $("#conducatori-salvati").on('change', function() {
      $(".user-initial-select").css('display', 'none');
      $("#wizard_container").css('display', 'block');
      let cod_unic = $('#conducatori-salvati').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        // url: "/platforma/public/conducator/"+cod_unic,
        url: site_url+"/conducator/"+cod_unic,
        encode: true,
      }).done(function (data) {
        console.log(data,'conducator');
        // let parsed = JSON.parse(data);
        $("#nume_conducator").val(data.nume);
        $("#prenume_conducator").val(data.prenume);
        $("#ci_conducator").val(data.serie_ci);
        $("#nr_ci_conducatorr").val(data.nr_ci);
        $("#cnp_conducator").val(data.cod_unic);
        $("#forward").trigger( "click" );
      });
    });

    $('#coducator-nou').on('click', function(){
        $("#nume_conducator").val('');
        $("#prenume_conducator").val('');
        $("#ci_conducator").val('');
        $("#nr_ci_conducatorr").val ('');
        $("#cnp_conducator").val('');
    });


    $("#replaceble").on('click', "#switch-dd-slider", function() {
      console.log('ceva?');
      if($("#switch-dd").is(':checked')){
        $(".container-dd").css('display', 'block');
        $(".container-ndd").css('display', 'none');
      } else {
        $(".container-dd").css('display', 'none');
        $(".container-ndd").css('display', 'block');
      }
    });

    ////Editare sectiune detalii

  $("#editare-detalii").on('click', function() {
    $('.account-extra  input[type=text]').prop( "disabled", true );
    $('#nume-detalii-header').text($("#nume-detalii").val());
    
    var formData = {
      nume: $("#nume-detalii").val(),
      // email: $("#email-detalii").val(),
      telefon: $("#telefon-detalii").val()
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      // url: "/platforma/public/users/",
      url: site_url+"/users/",
      data: formData,
      encode: true,
    }).done(function (data) {
      console.log(data,'editare');
      // let parsed = JSON.parse(data);
    });
  });

  $('#toggle-editare-detalii').on('click', function(){
    $('.account-extra input[type=text]').prop( "disabled", false );
    $(".actiuni-edit").css('display', 'flex');
    $("#toggle-editare-detalii").css('display', 'none');
  });

  $('#cancel-editare-detalii').on('click', function(){
    $('.account-extra input[type=text]').prop( "disabled", true );
    $(".actiuni-edit").css('display', 'none');
    $("#toggle-editare-detalii").css('display', 'block');
  });

  ////Editare sectiune detalii



  ////Editare sectiune coducatori


  $('.conducator-edit').on('click', function(){
    console.log($(this).data('index'));
    var cod = $(this).data('conducator');
    $('#edit-form-conducator').css('display', 'flex');
    $('#lista-conducator').css('display', 'none');
    $('.actiuni-edit').css('display', 'flex');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "GET",
      // url: "/platforma/public/conducator/"+cod,
      url: site_url+"/conducator/"+cod,
      encode: true,
    }).done(function (data) {
      console.log(data,'conducator');
      $("#nume-conducator").val(data.nume);
      $("#prenume-conducator").val(data.prenume);
      $("#cod-conducator").val(data.cod_unic);
      $("#nr-ci-conducator").val(data.nr_ci);
      $("#serie-ci-conducator").val(data.serie_ci);
      // let parsed = JSON.parse(data);
    });
  });


  $('#cancel-editare-conducator').on('click', function(){
    $('#edit-form-conducator').css('display', 'none');
    $('#lista-conducator').css('display', 'block');
    $('.actiuni-edit').css('display', 'none');

    $("#nume-conducator").val('');
    $("#prenume-conducator").val('');
    $("#cod-conducator").val('');
    $("#nr-ci-conducator").val('');
    $("#serie-ci-conducator").val('');
  });

  $('#editare-conducator').on('click', function(){
    var cod = $("#cod-conducator").val();
    var formData = {
      nume: $("#nume-conducator").val(),
      prenume: $("#prenume-conducator").val(),
      nr_ci: $("#nr-ci-conducator").val(),
      serie_ci: $("#serie-ci-conducator").val()
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      // url: "/platforma/public/conducator/"+cod,
      url: site_url+"/conducator/"+cod,
      data: formData,
      encode: true,
    }).done(function (data) {
      console.log(data,'editare');
      // let parsed = JSON.parse(data);
      $('#edit-form-conducator').css('display', 'none');
      $('#lista-conducator').css('display', 'block');
      $('.actiuni-edit').css('display', 'none');
      location.reload();
    });
  });

  $('.conducator-delete').on('click', function(){
    var cod = $(this).data('conducator');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "DELETE",
      // url: "/platforma/public/conducator/"+cod,
      url: site_url+"/conducator/"+cod,
      encode: true,
    }).done(function (data) {
      // console.log(data,'editare');
      location.reload();
    });
  });

  ////Editare sectiune coducatori

  ////Editare sectiune proprietari

  $('.proprietar-edit').on('click', function(){
    var cod = $(this).data('proprietar');
    $('#edit-form-proprietar').css('display', 'flex');
    $('#lista-proprietar').css('display', 'none');
    $('.actiuni-edit').css('display', 'flex');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "GET",
      // url: "/platforma/public/proprietar/"+cod,
      url: site_url+"/proprietar/"+cod,
      encode: true,
    }).done(function (data) {
      console.log(data,'proprietar');
      incarcaLocalitati(data.judet,data.localitate);
      // $("#localitate").val();
      $("#nume-proprietar").val(data.nume);
      $("#prenume-proprietar").val(data.prenume);
      $("#cod-proprietar").val(data.cod_unic);
      $("#nr-ci-proprietar").val(data.nr_ci);
      $("#serie-ci-proprietar").val(data.serie_ci);
      $("#tip_persoana-proprietar").val(data.tip_persoana);
      $("#judet-proprietar").val(data.judet);
      $("#strada-proprietar").val(data.strada);
      $("#numar-proprietar").val(data.numar);
      $("#bloc-proprietar").val(data.bloc);
      $("#scara-proprietar").val(data.scara);
      $("#etaj-proprietar").val(data.etaj);
      $("#apartament-proprietar").val(data.apartament);
      // let parsed = JSON.parse(data);
    });
  });


  $('#cancel-editare-proprietar').on('click', function(){
    $('#edit-form-proprietar').css('display', 'none');
    $('#lista-proprietar').css('display', 'block');
    $('.actiuni-edit').css('display', 'none');

    $("#nume-proprietar").val('');
    $("#prenume-proprietar").val('');
    $("#cod-proprietar").val('');
    $("#nr-ci-proprietar").val('');
    $("#serie-ci-proprietar").val('');
    $("#tip_persoana-proprietar").val('');
    $("#judet-proprietar").val('');
    $("#localitate").val('');
    $("#strada-proprietar").val('');
    $("#numar-proprietar").val('');
    $("#bloc-proprietar").val('');
    $("#scara-proprietar").val('');
    $("#etaj-proprietar").val('');
    $("#apartament-proprietar").val('');
  });

  $("#judet-proprietar").on('change', function() {
    incarcaLocalitati($("#judet-proprietar").val());
  });

  $('#editare-proprietar').on('click', function(){
    var cod = $("#cod-proprietar").val();
    var formData = {
      nume: $("#nume-proprietar").val(),
      prenume: $("#prenume-proprietar").val(),
      cod_unic: $("#cod-proprietar").val(),
      nr_ci: $("#nr-ci-proprietar").val(),
      serie_ci: $("#serie-ci-proprietar").val(),
      tip_persoana: $("#tip_persoana-proprietar").val(),
      judet: $("#judet-proprietar").val(),
      localitate: $("#localitate").val(),
      strada: $("#strada-proprietar").val(),
      numar: $("#numar-proprietar").val(),
      bloc: $("#bloc-proprietar").val(),
      scara: $("#scara-proprietar").val(),
      etaj: $("#etaj-proprietar").val(),
      apartament: $("#apartament-proprietar").val()
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      // url: "/platforma/public/proprietar/"+cod,
      url: site_url+"/proprietar/"+cod,
      data: formData,
      encode: true,
    }).done(function (data) {
      console.log(data,'editare');
      // let parsed = JSON.parse(data);
      $('#edit-form-proprietar').css('display', 'none');
      $('#lista-proprietar').css('display', 'block');
      $('.actiuni-edit').css('display', 'none');
      location.reload();
    });
  });

  $('.proprietar-delete').on('click', function(){
    var cod = $(this).data('proprietar');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "DELETE",
      // url: "/platforma/public/proprietar/"+cod,
      url: site_url+"/proprietar/"+cod,
      encode: true,
    }).done(function (data) {
      // console.log(data,'editare');
      location.reload();
    });
  });

  ////Editare sectiune proprietari


  ////Editare sectiune vehicule

  $('.vehicul-edit').on('click', function(){
    var cod = $(this).data('vehicul');
    $('#edit-form-vehicul').css('display', 'flex');
    $('#lista-vehicul').css('display', 'none');
    $('.actiuni-edit').css('display', 'flex');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "GET",
      // url: "/platforma/public/vehicul/"+cod,
      url: site_url+"/vehicul/"+cod,
      encode: true,
    }).done(function (data) {
      console.log(data,'vehicul');
      $("#marca").val(data.marca);
      $("#model-vehicul").val(data.model);
      $("#nr_inmatriculare-vehicul").val(data.nr_inmatriculare);
      $("#utilizare").val(data.utilizare);
      $("#combustibil").val(data.carburant);
      $("#an_fabricatie-vehicul").val(data.an_fabricatie);
      $("#capacitatea_cilindrica-vehicul").val(data.capacitatea_cilindrica);
      $("#masa_admisa-vehicul").val(data.masa_admia);
      $("#serie_civ-vehicul").val(data.serie_civ);
      $("#putere_motor-vehicul").val(data.putere_motor);
      $("#nr_locuri-vehicul").val(data.nr_locuri);
      // let parsed = JSON.parse(data);
    });
  });


  $('#cancel-editare-vehicul').on('click', function(){
    $('#edit-form-vehicul').css('display', 'none');
    $('#lista-vehicul').css('display', 'block');
    $('.actiuni-edit').css('display', 'none');

    $("#marca").val('');
    $("#model-vehicul").val('');
    $("#nr_inmatriculare-vehicul").val('');
    $("#utilizare").val('');
    $("#combustibil").val('');
    $("#an_fabricatie-vehicul").val('');
    $("#capacitatea_cilindrica-vehicul").val('');
    $("#masa_admisa-vehicul").val('');
    $("#serie_civ-vehicul").val('');
    $("#putere_motor-vehicul").val('');
    $("#nr_locuri-vehicul").val('');
  });

  $("#judet-vehicul").on('change', function() {
    incarcaLocalitati($("#judet-vehicul").val());
  });

  $('#editare-vehicul').on('click', function(){
    var cod = $("#nr_inmatriculare-vehicul").val();
    var formData = {
      marca : $("#marca").val(),
      model : $("#model-vehicul").val(),
      nr_inmatriculare : $("#nr_inmatriculare-vehicul").val(),
      utilizare : $("#utilizare").val(),
      carburant : $("#combustibil").val(),
      an_fabricatie : $("#an_fabricatie-vehicul").val(),
      capacitatea_cilindrica : $("#capacitatea_cilindrica-vehicul").val(),
      masa_admia : $("#masa_admisa-vehicul").val(),
      serie_civ : $("#serie_civ-vehicul").val(),
      putere_motor : $("#putere_motor-vehicul").val(),
      nr_locuri : $("#nr_locuri-vehicul").val(),
    }
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      // url: "/platforma/public/vehicul/"+cod,
      url: site_url+"/vehicul/"+cod,
      data: formData,
      encode: true,
    }).done(function (data) {
      console.log(data,'editare');
      // let parsed = JSON.parse(data);
      $('#edit-form-vehicul').css('display', 'none');
      $('#lista-vehicul').css('display', 'block');
      $('.actiuni-edit').css('display', 'none');
      location.reload();
    });
  });

  $('.vehicul-delete').on('click', function(){
    var cod = $(this).data('vehicul');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "DELETE",
      // url: "/platforma/public/vehicul/"+cod,
      url: site_url+"/vehicul/"+cod,
      encode: true,
    }).done(function (data) {
      // console.log(data,'editare');
      location.reload();
    });
  });

  ////Editare sectiune vehicule

  if($("#data_rca")){
    //data
    var today = new Date();
    today = new Date(today.setDate(today.getDate() + 1)).toISOString().split('T')[0];
    $("#data_rca")[0].setAttribute('min', today);
  }
  
  // $("#data_rca")[0].val(today).trigger('change');

})(jQuery)