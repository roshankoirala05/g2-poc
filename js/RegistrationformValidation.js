$(document).ready(function () {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later

        container: 'popover',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok-circle',
            invalid: 'glyphicon glyphicon-remove-circle',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                validators: {
                    stringLength: {
                        min: 1,
                        message: "What's your first name?"
                    },
                    notEmpty: {
                        message: "What's your first name?"
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
                        min: 1,
                        message: "What's your last name?"
                    },
                    notEmpty: {
                        message: "What's your last name?"
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'Last name can only consist of alphabetical'
                    }
                }
            },
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
            countryName: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Country'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'Please Enter Your Valid Email'
                    }
                }
            },
            TravelingFor: {
                validators: {
                    notEmpty: {
                        message: 'Please provide why you are traveling ?'
                    }
                }
            },
            HowDidYouHear: {
                validators: {
                    notEmpty: {
                        message: 'Please provide how did you hear about us ?'
                    }
                }
            },
            DidYouStay: {
                validators: {
                    notEmpty: {
                        message: 'Did you stay in MWM Hotel?'
                    }
                }
            },
            noInParty: {
                validators: {
                    integer: {
                        message: 'Integer value Please'
                    },
                    between: {
                        min: 1,
                        max: 50,
                        message: 'Please enter at least 1 and no more that 50 !'
                    },
                    notEmpty: {
                        message: 'Number of people with you'
                    }
                }
            },

        },



    })

});
