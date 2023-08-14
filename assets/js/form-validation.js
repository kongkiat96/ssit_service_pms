'use strict';

(function() {
    // Init custom option check
    window.Helpers.initCustomOptionCheck();

    // Bootstrap validation example
    //------------------------------------------------------------------------------------------
    // const flatPickrEL = $('.flatpickr-validation');
    const flatPickrList = [].slice.call(document.querySelectorAll('.flatpickr-validation'));

    // Flat pickr
    if (flatPickrList) {
        flatPickrList.forEach(flatPickr => {
            flatPickr.flatpickr({
                allowInput: true,
                monthSelectorType: 'static',
                disableMobile: 'true',
                locale: 'th',
                dateFormat: 'd/m/Y',
                minDate: 'today',
            });
        });
    }

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const bsValidationForms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(bsValidationForms).forEach(function(form) {
        form.addEventListener(
            'submit',
            function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    // Submit your form
                    //alert('Submitted!!!');
                }

                form.classList.add('was-validated');
            },
            false
        );
    });
})();
/**
 * Form Validation (https://formvalidation.io/guide/examples)
 * ? Primary form validation plugin for this template
 * ? In this example we've try to covered as many form inputs as we can.
 * ? Though If we've miss any 3rd party libraries, then refer: https://formvalidation.io/guide/examples/integrating-with-3rd-party-libraries
 */
//------------------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function(e) {
    (function() {
        const formValidationExamples = document.getElementById('formValidationExamples'),
            formValidationSelect2Ele = jQuery(formValidationExamples.querySelector('[name="formValidationSelect2"]')),
            /* Select ON service form */
            formName = jQuery(formValidationExamples.querySelector('[name="name_user"]')),
            req_service = jQuery(formValidationExamples.querySelector('[name="req_service"]')),
            se_location = jQuery(formValidationExamples.querySelector('[name="se_location"]')),
            service = jQuery(formValidationExamples.querySelector('[name="service"]')),
            service_id = jQuery(formValidationExamples.querySelector('[name="service_id"]')),

            formValidationTechEle = jQuery(formValidationExamples.querySelector('[name="formValidationTech"]')),
            formValidationLangEle = formValidationExamples.querySelector('[name="formValidationLang"]'),
            formValidationHobbiesEle = jQuery(formValidationExamples.querySelector('.selectpicker')),
            tech = [
                'ReactJS',
                'Angular',
                'VueJS',
                'Html',
                'Css',
                'Sass',
                'Pug',
                'Gulp',
                'Php',
                'Laravel',
                'Python',
                'Bootstrap',
                'Material Design',
                'NodeJS'
            ];

        const fv = FormValidation.formValidation(formValidationExamples, {
            fields: {
                prefixname: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ คำนำหน้า'
                      }
                      // stringLength: {
                      //   min: 6,
                      //   max: 30,
                      //   message: 'ระบุ The name must be more than 6 and less than 30 characters long'
                      // },
                      // regexp: {
                      //   regexp: /^[a-zA-Z0-9 ]+$/,
                      //   message: 'ระบุ The name can only consist of alphabetical, number and space'
                      // }
                    }
                  },
                  fname: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ ชื่อเจ้าหน้าที่'
                      }
                      // stringLength: {
                      //   min: 6,
                      //   max: 30,
                      //   message: 'ระบุ The name must be more than 6 and less than 30 characters long'
                      // },
                      // regexp: {
                      //   regexp: /^[a-zA-Z0-9 ]+$/,
                      //   message: 'ระบุ The name can only consist of alphabetical, number and space'
                      // }
                    }
                  },
                  lname: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ นามสกุลเจ้าหน้าที่'
                      }
                    }
                  },
                  position: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ ตำแหน่ง'
                      }
                    }
                  },
                  department: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ สังกัด'
                      }
                    }
                  },
                  tel: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ หมายเลขโทรศัพท์'
                      },
                      stringLength: {
                        min: 10,
                        max: 10,
                        message: 'ต้องไม่เกิน 10 หลัก'
                      },
                      regexp: {
                        regexp: /^[0-9 ]+$/,
                        message: 'ระบุ เฉพาะตัวเลขเท่านั้น'
                      }
                    }
                  },
                  building: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ อาคาร'
                      }
                    }
                  },
                  floor: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ ชั้น'
                      }
                    }
                  },
                  room: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ ห้อง'
                      }
                    }
                  },
                  status_guest: {
                    validators: {
                      notEmpty: {
                        message: 'ระบุ สถานะ'
                      }
                    }
                  },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: function(field, ele) {
                        // field is the field name & ele is the field element
                        switch (field) {
                            case 'formValidationName':
                            case 'call_back':
                            case 'number_asset':
                            case 'se_room':
                            case 'other':
                            case 'formValidationEmail':
                            case 'formValidationPass':
                            case 'formValidationConfirmPass':
                            // case 'formValidationFile':
                            case 'formValidationDob':
                            case 'formValidationSelect2':
                            case 'name_user':
                            case 'req_service':
                            case 'se_location':
                            case 'service':
                            case 'service_id':
                            case 'formValidationLang':
                            case 'formValidationTech':
                            case 'formValidationHobbies':
                            case 'formValidationBio':
                            case 'formValidationGender':
                                // return '.col-md-6';
                            case 'formValidationPlan':
                                // return '.col-xl-3';
                            case 'formValidationSwitch':
                            case 'formValidationCheckbox':
                                // return '.col-12';
                            default:
                                return '.row';
                        }
                    }
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                // Submit the form when all fields are valid
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                autoFocus: new FormValidation.plugins.AutoFocus()
            },
            init: instance => {
                instance.on('plugins.message.placed', function(e) {
                    //* Move the error message out of the `input-group` element
                    if (e.element.parentElement.classList.contains('input-group')) {
                        // `e.field`: The field name
                        // `e.messageElement`: The message element
                        // `e.element`: The field element
                        e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
                    }
                    //* Move the error message out of the `row` element for custom-options
                    if (e.element.parentElement.parentElement.classList.contains('custom-option')) {
                        e.element.closest('.row').insertAdjacentElement('afterend', e.messageElement);
                    }
                });
            }
        });

        //? Revalidation third-party libs inputs on change trigger

        // Flatpickr
        flatpickr(formValidationExamples.querySelector('[name="formValidationDob"]'), {
            enableTime: false,
            monthSelectorType: 'static',
            disableMobile: 'true',
            locale: 'th',
            dateFormat: 'd/m/Y',
            minDate: 'today',
            // See https://flatpickr.js.org/formatting/
            //dateFormat: 'Y/m/d',
            // After selecting a date, we need to revalidate the field
            onChange: function() {
                fv.revalidateField('formValidationDob');
            }
        });


        // Select2 (Country)
        if (formValidationSelect2Ele.length) {
            formValidationSelect2Ele.wrap('<div class="position-relative"></div>');
            formValidationSelect2Ele
                .select2({
                    placeholder: 'Select country',
                    dropdownParent: formValidationSelect2Ele.parent()
                })
                .on('change.select2', function() {
                    // Revalidate the color field when an option is chosen
                    fv.revalidateField('formValidationSelect2');
                });
        }

        if (formName.length) {
            formName.wrap('<div class="position-relative"></div>');
            formName
                .select2({
                    placeholder: 'เลือกข้อมูล',
                    dropdownParent: formName.parent()
                })
                .on('change.select2', function() {
                    // Revalidate the color field when an option is chosen
                    fv.revalidateField('name_user');
                });
        }

        if (req_service.length) {
            req_service.wrap('<div class="position-relative"></div>');
            req_service
                .select2({
                    placeholder: 'เลือกข้อมูล',
                    dropdownParent: req_service.parent()
                })
                .on('change.select2', function() {
                    // Revalidate the color field when an option is chosen
                    fv.revalidateField('req_service');
                });
        }

        if (se_location.length) {
            se_location.wrap('<div class="position-relative"></div>');
            se_location
                .select2({
                    placeholder: 'เลือกข้อมูล',
                    dropdownParent: se_location.parent()
                })
                .on('change.select2', function() {
                    // Revalidate the color field when an option is chosen
                    fv.revalidateField('se_location');
                });
        }

        if (service.length) {
            service.wrap('<div class="position-relative"></div>');
            service
                .select2({
                    placeholder: 'เลือกข้อมูล',
                    dropdownParent: service.parent()
                })
                .on('change.select2', function() {
                    // Revalidate the color field when an option is chosen
                    fv.revalidateField('service');
                });
        }

        if (service_id.length) {
            service_id.wrap('<div class="position-relative"></div>');
            service_id
                .select2({
                    placeholder: 'เลือกข้อมูล',
                    dropdownParent: service_id.parent()
                })
                .on('change.select2', function() {
                    // Revalidate the color field when an option is chosen
                    fv.revalidateField('service_id');
                });
        }

        // Typeahead

        // String Matcher function for typeahead
        const substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substrRegex;
                matches = [];
                substrRegex = new RegExp(q, 'i');
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        // Check if rtl
        if (isRtl) {
            const typeaheadList = [].slice.call(document.querySelectorAll('.typeahead'));

            // Flat pickr
            if (typeaheadList) {
                typeaheadList.forEach(typeahead => {
                    typeahead.setAttribute('dir', 'rtl');
                });
            }
        }
        formValidationTechEle.typeahead({
            hint: !isRtl,
            highlight: true,
            minLength: 1
        }, {
            name: 'tech',
            source: substringMatcher(tech)
        });

        // Tagify
        let formValidationLangTagify = new Tagify(formValidationLangEle);
        formValidationLangEle.addEventListener('change', onChange);

        function onChange() {
            fv.revalidateField('formValidationLang');
        }

        //Bootstrap select
        formValidationHobbiesEle.on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            fv.revalidateField('formValidationHobbies');
        });
    })();
});