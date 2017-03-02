  
  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                validators: {
                     stringLength: {
                        min: 2,
                        message: 'Please Enter your First Name'
                    },
                    notEmpty: {
                        message: 'Please Enter your first Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'First name can only consist of alphabetical'
                    }
                }
            },
             lastName: {
                validators: {
                     stringLength: {
                        min: 2,
                         message: 'Please Enter Your Last Name'
                    },
                    notEmpty: {
                        message: 'Please Enter Your Last Name'
                    },
                     regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'Last name can only consist of alphabetical'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter Your Email '
                    },
                    emailAddress: {
                        message: 'Please Enter Your Valid Email'
                    }
                }
            },
            /*
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'US',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            */
            cityName: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            stateName: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            countryName: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Country'
                    }
                }
            },
            /*TravelingFor: {
                validators: {
                    notEmpty: {
                        message: 'The job position is required'
                    }
                }
            },
            HowDidYouHear: {
                validators: {
                    notEmpty: {
                        message: 'The job position is required'
                    }
                }
            },
            DidYouStay: {
                validators: {
                    notEmpty: {
                        message: 'The job position is required'
                    }
                }
            },
            */
            zipCode: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
                 noInParty: {
                validators: {
                     integer: {
                        message: 'The value is not an integer'
                    },
                      between: {
                        min: 1,
                        max: 50,
                        message:'Please enter at least 1 and no more that 50 !'
                    },
                    notEmpty: {
                        message: 'Number in Party'
                    }
                    }
                },
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
         $('#contact_form').bootstrapValidator('resetForm', true);
});