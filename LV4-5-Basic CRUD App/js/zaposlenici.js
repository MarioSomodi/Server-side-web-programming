(function () {
    LoadEmployees();
})();


function LoadEmployees() {
    $.ajax(
        {
            url: "LV4/json.php?json_id=get_all_employees",
            type: "GET",
            success: function (oData) {
                var obj = JSON.parse(oData);

                obj.forEach((element, index) => {
                    $('#tableEmp > tbody').append(`<tr> 
                    <td>${index}</td> 
                    <td id="emp_no">${element["emp_no"]}</td> 
                    <td>${element["birth_date"]}</td> 
                    <td>${element["first_name"]}</td> 
                    <td>${element["last_name"]}</td> 
                    <td>${element["gender"]}</td> 
                    <td>${element["hire_date"]}</td> 
                    <td><button style="cursor: pointer" class="btn btn-success glyphicon glyphicon-pencil" onclick="GetModal('modals.php?modal_id=edit_employee&emp_id=${element["emp_no"]}')" aria-hidden="true"></button></td>
                    <td><button style="cursor: pointer" class="btn btn-danger glyphicon glyphicon-remove" onclick="GetModal('modals.php?modal_id=delete_employee&emp_id=${element["emp_no"]}')" aria-hidden="true"></button></td>
                    </tr>`);
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
}

function Clear()
{
    $('#tableEmp tbody').empty();
    $('#modals').modal('hide')
}





function Save() {
    var result = $('form#addEmployee :input').serialize();

    $.ajax(
        {
            async: false,
            url: "LV4/action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )

    Clear();
    LoadEmployees();

    $('form#addEmployee :input').each(function()
    {
        $(this).val("");
    })

    
}


function Edit()
{
    var result = $('form#editEmployee :input').serialize();

    $.ajax(
        {
            async: false,
            url: "LV4/action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
    
    Clear();
    LoadEmployees();
}


function Delete()
{
    var result = $('form#deleteEmployee :input:lt(2)').serialize();

    console.log(result);

    $.ajax(
        {
            async: false,
            url: "LV4/action.php",
            type: "POST",
            data: result,
            success: function (response) {
                alert(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )
    
    

    Clear();
    LoadEmployees();
}