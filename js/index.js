$(document).ready(function () {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
        framework: 'bootstrap',
        err: {
            // You can set it to popover
            // The message then will be shown in Bootstrap popover
            container: 'popover'
        },
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok-circle',
            invalid: 'glyphicon glyphicon-remove-circle',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                 row: '.col-xs-4',
                validators: {
                    stringLength: {
                        min: 1,
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
                 row: '.col-xs-4',
                validators: {
                    stringLength: {
                        min: 1,
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
                        message: 'The value is not an integer'
                    },
                    between: {
                        min: 1,
                        max: 50,
                        message: 'Please enter at least 1 and no more that 50 !'
                    },
                    notEmpty: {
                        message: 'Number in Party'
                    }
                }
            },
        }
    })

});
