var form_1 = document.querySelector(".form_1");
var form_2 = document.querySelector(".form_2");
var form_3 = document.querySelector(".form_3");

var form_1_btns = document.querySelector(".form_1_btns");
var form_2_btns = document.querySelector(".form_2_btns");
var form_3_btns = document.querySelector(".form_3_btns");

var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");
var form_2_next_btn = document.querySelector(".form_2_btns .btn_next");
var form_3_back_btn = document.querySelector(".form_3_btns .btn_back");

var form_2_progessbar = document.querySelector(".form_2_progessbar");
var form_3_progessbar = document.querySelector(".form_3_progessbar");

var btn_submit = document.querySelector(".btn_submit");
var modal_wrapper = document.querySelector(".modal_wrapper");
var shadow = document.querySelector(".shadow");

form_1_next_btn.addEventListener("click", function(){
	form_1.style.display = "none";
	form_2.style.display = "block";

	form_1_btns.style.display = "none";
	form_2_btns.style.display = "flex";

	form_2_progessbar.classList.add("active");
});

form_2_back_btn.addEventListener("click", function(){
	form_1.style.display = "block";
	form_2.style.display = "none";

	form_1_btns.style.display = "flex";
	form_2_btns.style.display = "none";

	form_2_progessbar.classList.remove("active");
});

form_2_next_btn.addEventListener("click", function(){
	form_2.style.display = "none";
	form_3.style.display = "block";

	form_3_btns.style.display = "flex";
	form_2_btns.style.display = "none";

	form_3_progessbar.classList.add("active");
});

form_3_back_btn.addEventListener("click", function(){
	form_2.style.display = "block";
	form_3.style.display = "none";

	form_3_btns.style.display = "none";
	form_2_btns.style.display = "flex";

	form_3_progessbar.classList.remove("active");
});

btn_submit.addEventListener("click", function(e){
    e.preventDefault();
    var formData = new FormData();

    formData.append("name", document.getElementById("name").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("adultTraveler", document.getElementById("adultTraveler").value);
    formData.append("childTraveler", document.getElementById("childTraveler").value);
    formData.append("destination", document.getElementById("destination").value);
    formData.append("departure", document.getElementById("departure").value);
    formData.append("departDate", document.getElementById("departDate").value);
    formData.append("returnDate", document.getElementById("returnDate").value);
    formData.append("budget", document.getElementById("budget").value);
    formData.append("payMethod", document.querySelector('input[name="payMethod"]:checked').value);

    var fileInput = document.getElementById("quotatnFile");
    if (fileInput.files.length > 0) {
        formData.append("quotatnFile", fileInput.files[0]);
    }

    fetch('booking.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        modal_wrapper.classList.add("active");
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

function submitted_Message() {
    alert("Your booking form has been submitted to Cuti cuti Melaka. We will contact you shortly.");
}
