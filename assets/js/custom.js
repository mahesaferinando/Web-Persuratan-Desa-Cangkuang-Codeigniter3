function hanyaAngka(evt) 
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
    return true;
}

function checkInput(ob) 
{
    var invalidChars = /[^0-9]/gi
    if (invalidChars.test(ob.value)) {
        ob.value = ob.value.replace(invalidChars, "");
    }
}

function setdate()
{
    var tt =$('#first').val();

    var daysname = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var date = new Date(tt);
    var day = date.getDate();
    var getDate = date.getDay(),
    thisDay = daysname[getDate];

    $('#second').val(thisDay);

}



function subMenu(evt, Menu) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(Menu).style.display = "block";
    evt.currentTarget.className += " active";
  }

  let modalId = $('#image-gallery');
$(document)
  .ready(function () {
    loadGallery(true, 'a.thumbnail');
    function disableButtons(counter_max, counter_current) {
      $('#show-prev-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-prev-image')
          .hide();
      }
    }
    function loadGallery(setIDs, setClickAttr) {
      let current_image, selector, counter = 0;
      $('#show-next-image, #show-prev-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-prev-image') {
            current_image--;
          } else {
            current_image++;
          }
          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });
      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }
      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

  $(document).ready(function () {
    $('#dtOrderExample').DataTable({
    "order": [[ 3, "desc" ]]
    });
    $('.dataTables_length').addClass('bs-select');
    });

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');
   
    togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('fa-eye-slash');
  });
