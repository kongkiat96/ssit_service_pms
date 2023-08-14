/**
 *  Form Wizard
 */

'use strict';

(function () {
  const select2 = $('.select2'),
    selectPicker = $('.selectpicker');

  // Wizard Validation
  // --------------------------------------------------------------------
  const wizardValidation = document.querySelector('#wizard-validation');
  if (typeof wizardValidation !== undefined && wizardValidation !== null) {
    // Wizard form
    const wizardValidationForm = wizardValidation.querySelector('#wizard-validation-form');
    // Wizard steps
    const wizardValidationFormStep1 = wizardValidationForm.querySelector('#account-details-validation');
    const wizardValidationFormStep2 = wizardValidationForm.querySelector('#personal-info-validation');
    const wizardValidationFormStep3 = wizardValidationForm.querySelector('#social-links-validation');
    // Wizard next prev button
    const wizardValidationNext = [].slice.call(wizardValidationForm.querySelectorAll('.btn-next'));
    const wizardValidationPrev = [].slice.call(wizardValidationForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardValidation, {
      linear: true
    });

    // Account details
    const FormValidation1 = FormValidation.formValidation(wizardValidationFormStep1, {
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
        // formValidationEmail: {
        //   validators: {
        //     notEmpty: {
        //       message: 'The Email is required'
        //     },
        //     emailAddress: {
        //       message: 'The value is not a valid email address'
        //     }
        //   }
        // },
        // formValidationPass: {
        //   validators: {
        //     notEmpty: {
        //       message: 'The password is required'
        //     }
        //   }
        // },
        // formValidationConfirmPass: {
        //   validators: {
        //     notEmpty: {
        //       message: 'The Confirm Password is required'
        //     },
        //     identical: {
        //       compare: function () {
        //         return wizardValidationFormStep1.querySelector('[name="formValidationPass"]').value;
        //       },
        //       message: 'The password and its confirm are not the same'
        //     }
        //   }
        // }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-sm-12'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          //* Move the error message out of the `input-group` element
          if (e.element.parentElement.classList.contains('input-group')) {
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      // validationStepper.next();
      // alert('Submitted..!!');
    });

    // Personal info
    const FormValidation2 = FormValidation.formValidation(wizardValidationFormStep2, {
      fields: {
        formValidationFirstName: {
          validators: {
            notEmpty: {
              message: 'The first name is required'
            }
          }
        },
        formValidationLastName: {
          validators: {
            notEmpty: {
              message: 'The last name is required'
            }
          }
        },
        formValidationCountry: {
          validators: {
            notEmpty: {
              message: 'The Country is required'
            }
          }
        },
        formValidationLanguage: {
          validators: {
            notEmpty: {
              message: 'The Languages is required'
            }
          }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-sm-6'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
    });

    // Bootstrap Select (i.e Language select)
    if (selectPicker.length) {
      selectPicker.each(function () {
        var $this = $(this);
        $this.selectpicker().on('change', function () {
          FormValidation2.revalidateField('formValidationLanguage');
        });
      });
    }

    // select2
    if (select2.length) {
      select2.each(function () {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this
          .select2({
            placeholder: 'Select an country',
            dropdownParent: $this.parent()
          })
          .on('change.select2', function () {
            // Revalidate the color field when an option is chosen
            FormValidation2.revalidateField('formValidationCountry');
          });
      });
    }

    // Social links
    const FormValidation3 = FormValidation.formValidation(wizardValidationFormStep3, {
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
          rowSelector: '.col-sm-12'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // You can submit the form
      // wizardValidationForm.submit()
      // or send the form data to server via an Ajax request
      // To make the demo simple, I just placed an alert
      alert('Submitted..!!');
    });

    wizardValidationNext.forEach(item => {
      item.addEventListener('click', event => {
        // When click the Next button, we will validate the current step
        switch (validationStepper._currentIndex) {
          case 0:
            FormValidation1.validate();
            break;

          case 1:
            FormValidation2.validate();
            break;

          case 2:
            FormValidation3.validate();
            break;

          default:
            break;
        }
      });
    });

    wizardValidationPrev.forEach(item => {
      item.addEventListener('click', event => {
        switch (validationStepper._currentIndex) {
          case 2:
            validationStepper.previous();
            break;

          case 1:
            validationStepper.previous();
            break;

          case 0:

          default:
            break;
        }
      });
    });
  }
})();
