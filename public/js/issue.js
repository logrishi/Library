$(function() {
    accessionNoCheck();
    registrationNoCheck();
    dueDateCheck();
    returnDateFineCheck();
    // ddlValue();
});

function accessionNoCheck() {
    $("#checkAcsBtn").click(function(event) {
        event.preventDefault();
        // alert("The paragraph was clicked.");
        var acsNo = $("#accession_no").val();
        // alert(acsNo);
        var url = "/issue/acs/" + acsNo;

        $.getJSON(url, function(data) {
            // alert(data.count);
            if (data.count == 0) {
                $("#acsNoErrorDiv").show();
                $("#issueDiv").hide();
                $("#returnDiv").hide();
                $("#detailsDiv").hide();

                //  $("#issue_no").val("");
                $("#issue_date").val("");
                $("#dueDate").text("");
                $("#return_date").val("");
                $("#registration_no").val("");
                $("#is_returned").prop("checked", false);

                $("#regNoErrorDiv").hide();
                $("#MaxBooksDiv").hide();

                $("#fineDiv").hide();
                $("#dateErrorDiv").hide();
                $("#fineLabel").text("");
                $("#dateError").text("");
                $("#fine_generated").val("");
                $("#due_date").val("");

                $("#formDiv").hide();
            } else if (data.count != 0) {
                if (data.issued == 0) {
                    $("#issueDiv").show();
                    $("#acsNoErrorDiv").hide();
                    $("#returnDiv").hide();
                    $("#detailsDiv").hide();
                    $("#regNoDiv").show();

                    //  $("#issue_no").val("");
                    $("#issue_date").val("");
                    $("#dueDate").text("");
                    $("#return_date").val("");
                    $("#registration_no").val("");
                    $("#is_returned").prop("checked", false);

                    $("#regNoErrorDiv").hide();
                    $("#MaxBooksDiv").hide();

                    $("#fineDiv").hide();
                    $("#dateErrorDiv").hide();
                    $("#fineLabel").text("");
                    $("#dateError").text("");
                    $("#fine_generated").val("");
                    $("#due_date").val("");

                    $("#formDiv").hide();
                } else {
                    // alert(data.details.registration_no);
                    $("#regNo").text(
                        "Registration No: " + data.details.registration_no
                    );
                    var issueDate = moment(data.details.issue_date).format(
                        "DD-MM-YYYY"
                    );
                    $("#issueDate").text("Issue Date: " + issueDate);
                    $("#detailsDiv").show();
                    $("#returnDiv").show();
                    $("#acsNoErrorDiv").hide();
                    $("#issueDiv").hide();

                    //$("#issue_no").val("");
                    $("#issue_date").val("");
                    $("#dueDate").text("");
                    $("#return_date").val("");
                    $("#registration_no").val("");
                    $("#is_returned").prop("checked", false);

                    $("#regNoErrorDiv").hide();
                    $("#MaxBooksDiv").hide();

                    $("#fineDiv").hide();
                    $("#dateErrorDiv").hide();
                    $("#fineLabel").text("");
                    $("#dateError").text("");
                    $("#fine_generated").val("");
                    $("#due_date").val("");
                }
            }
        });
    });
}
function registrationNoCheck() {
    $("#registration_no").blur(function() {
        var regNo = $(this).val();
        var url = "/issue/reg/" + regNo;

        $.getJSON(url, function(data) {
            if (data.member == 0) {
                $("#regNoErrorDiv").show();
                $("#MaxBooksDiv").hide();
                $("#formDiv").hide();

                //  $("#issue_no").val("");
                $("#issue_date").val("");
                $("#dueDate").text("");
                $("#return_date").val("");
                $("#is_returned").prop("checked", false);

                $("#fineDiv").hide();
                $("#dateErrorDiv").hide();
                $("#fineLabel").text("");
                $("#dateError").text("");
                $("#fine_generated").val("");
                $("#due_date").val("");
            } else {
                if (data.issuedBooks >= data.maxBooks[0].max_books) {
                    $("#MaxBooksDiv").show();
                    $("#formDiv").hide();
                    $("#regNoErrorDiv").hide();

                    //  $("#issue_no").val("");
                    $("#issue_date").val("");
                    $("#dueDate").text("");
                    $("#return_date").val("");
                    $("#is_returned").prop("checked", false);

                    $("#fineDiv").hide();
                    $("#dateErrorDiv").hide();
                    $("#fineLabel").text("");
                    $("#dateError").text("");
                    $("#fine_generated").val("");
                    $("#due_date").val("");
                } else {
                    $("#formDiv").show();
                    $("#MaxBooksDiv").hide();
                    $("#regNoErrorDiv").hide();

                    //$("#issue_no").val("");
                    $("#issue_date").val("");
                    $("#dueDate").text("");
                    $("#return_date").val("");
                    $("#is_returned").prop("checked", false);

                    $("#fineDiv").hide();
                    $("#dateErrorDiv").hide();
                    $("#fineLabel").text("");
                    $("#dateError").text("");
                    $("#fine_generated").val("");
                    $("#due_date").val("");
                }
            }
        });
    });
}
function dueDateCheck() {
    $("#issue_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            var issueDate = $(this).val();
            var url = "/issue/dueDate/" + issueDate;
            $.getJSON(url, function(data) {
                // var new_date = moment(dateText, "DD-MM-YYYY").add(5, 'days');
                var idate = moment(dateText).format("DD-MM-YYYY");
                var dueDate = moment(idate, "DD-MM-YYYY").add(
                    data.days,
                    "days"
                );
                var date = moment(dueDate).format("YYYY-MM-DD");

                $("#dueDateDiv").show();
                $("#dueDate").text("Due Date");
                $("#due_date").val(date);
            });
        }
    });
}
function returnDateFineCheck() {
    $("#return_date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function(dateText) {
            var returnDate = $(this).val();
            var url = "/issue/returnDate/" + returnDate;

            $.getJSON(url, function(data) {
                // alert(dateText);
                console.log(data);
                var rDate = moment(dateText).format("MM-DD-YYYY");
                var iDate = moment(data.issueDate[0].issue_date).format(
                    "MM-DD-YYYY"
                );

                var maxDays = data.fineAmount.max_days;
                var fineAmount = data.fineAmount.fine_amount;
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                console.log(fineAmount);
                var firstDate = new Date(iDate);
                var secondDate = new Date(rDate);

                var diffDays = Math.round(
                    (secondDate.getTime() - firstDate.getTime()) / oneDay
                );

                if (diffDays < 0) {
                    $("#dateErrorDiv").show();
                    $("#dateError").text(
                        "Invalid Date! Return Date Can't Be less Than Issue Date"
                    );
                    $("#fineDiv").hide();
                    $("#fine_generated").val("");
                } else if (diffDays > maxDays) {
                    var fine = (diffDays - maxDays) * fineAmount;
                    $("#fineLabel").text("Fine Amount To Be Paid Rs: ");
                    $("#fine_generated").val(fine);
                    $("#fineDiv").show();
                    $("#dateErrorDiv").hide();
                } else {
                    $("#fineDiv").hide();
                    $("#dateErrorDiv").hide();
                    $("#fineLabel").text("");
                    $("#dateError").text("");
                    $("#fine_generated").val("");
                }
            });
        }
    });
}

// function ddlValue() {
//     $("#ddl").change(function() {
//         var ddlVal = $(this).val();
//         //  alert(ddlVal);
//         var url = "/book/ddl/" + ddlVal;
//         // alert(url);
//         //  $.getJSON(url, function (data) {
//         // alert(data);
//         if (ddlVal == "acc") {
//             $("#acc").show();
//             $("#name").hide();
//         } else if (ddlVal == "name") {
//             $("#name").show();
//             $("#acc").hide();
//         } else if (ddlVal == "select") {
//             $("#acc").hide();
//             $("#name").hide();
//         }

//         //});
//     });
// }
