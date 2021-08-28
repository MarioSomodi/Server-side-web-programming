(function()
{
    LoadDepartments()
    
})();

function LoadDepartments() {
    $.ajax(
        {
            url: "LV4/json.php?json_id=get_all_departments",
            type: "GET",
            success: function (oData) {
                var obj = JSON.parse(oData);
                obj.forEach((element, index) => {
                    $('#tableDep > tbody').append(`<tr> 
                    <td>${index}</td> 
                    <td id="emp_no">${element["dept_no"]}</td> 
                    <td>${element["dept_name"]}</td> 
                    <td><span style="cursor: pointer" class="btn btn-success glyphicon glyphicon-pencil" onclick="GetModal('modals.php?modal_id=edit_department&dep_id=${element["dept_no"]}')" aria-hidden="true"></td>
                    <td><span style="cursor: pointer" class="btn btn-danger glyphicon glyphicon-remove" onclick="GetModal('modals.php?modal_id=delete_deparmtent&dep_id=${element["dept_no"]}')" aria-hidden="true"></td>
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
    $('#tableDep tbody').empty();
    $('#modals').modal('hide');

    LoadDepartments();
}


function Save()
{
    var result = $('form#addDepartment :input').serialize();

    $.ajax(
        {
            async: false,
            url: "LV4/action.php",
            type: "POST",
            data: result,
            success: function (response) {
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }
    )

    Clear();
    

    $('form#addDepartment :input').each(function()
    {
        $(this).val("");
    })
}


function Edit()
{
    var result = $('form#editDepartment :input').serialize();

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
}

function Delete()
{
    var result = $('form#deleteDepartment :input').serialize();

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
}