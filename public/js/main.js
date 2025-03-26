//
// var uploadField = document.getElementById("exampleInputFile");
// // var uploadField = document.getElementById("image");
//
// uploadField.onchange = function() {
//
//     if(this.files[0].size > 5242800){
//         alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
//         this.value = "";
//     };
// };




            var uploadField = document.getElementById("MK_file_input");

				uploadField.onchange = function() {

					if(this.files[0].size > 3145680){
					   alert("Bunday katta hajmdagi ma'lumot yuklashga ruxsat berilmagan. Kichikroq fayl tanlang!");
					   this.value = "";
					// $("#iframePdf").attr("src","");

					};
				};
