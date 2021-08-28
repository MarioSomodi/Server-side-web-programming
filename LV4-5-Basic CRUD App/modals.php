<?php
include './LV4/connection.php';

if (isset($_GET['modal_id'])) {


    switch ($_GET['modal_id']) {


        case 'new_employee':
                    echo 
                    '<div class="modal-body" style="padding:0">
                        <div class="modal-header" style="margin-bottom:25px;">
                            <button style="color:white" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" style="color:white">Novi zaposlenik</h4>
                        </div>
                        <form class="form-horizontal" id="addEmployee">
                            <input type="hidden" value="AddEmployee" name="action_id">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Birth date</label>
                                <div class="col-md-8">
                                    <input required type="date" class="form-control" placeholder="" name="empBirthDate" />
                                </div>
                                <label class="col-md-3 control-label">First name</label>
                                <div class="col-md-8">
                                    <input required type="text" class="form-control" name="empFirstName" placeholder="Ime" />
                                </div>
                                <label class="col-md-3 control-label">Last name</label>
                                <div class="col-md-8">
                                    <input required type="text" class="form-control" name="empLastName" placeholder="Prezime" />
                                </div>
                                <label class="col-md-3 control-label">Gender</label>
                                <div class="col-md-8">
                                    <input required type="text" class="form-control" name="empGender" value="M" pattern="M|F" size="32" title="only letter M or F is allowed"/>
                                </div>
                                <label class="col-md-3 control-label">Hire date</label>
                                <div class="col-md-8">
                                    <input required type="date" class="form-control" name="empHireDate" placeholder="" />
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success btn-s" onclick="Save()">Spremi</button>
                            <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
                        </div>
                    </div>';
                    break;
        
        
        
        
        case 'edit_employee':


            if (isset($_GET['emp_id'])) {

                $query = "SELECT * FROM employees WHERE emp_no = " . $_GET['emp_id'];
                $oResult = $oConnection->query($query);
                $row = array();
                while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                    $row[] = $oRow;
                }
                $result = $row[0];

                echo 
                '<div class="modal-body" style="padding:0">
                    <div class="modal-header" style="margin-bottom:25px;">
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color:white">Uredi zaposlenika</h4>
                    </div>
                    <form class="form-horizontal" id="editEmployee">
                        <input type="hidden" value="UpdateEmployee" name="action_id">
                        <input type="hidden" value="' . $result['emp_no'] . '" name="empId">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Birth date</label>
                            <div class="col-md-8">
                                <input required type="date" class="form-control" placeholder="" name="empBirthDate" value="' . $result['birth_date'] . '"/>
                            </div>
                            <label class="col-md-3 control-label">First name</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="empFirstName" placeholder="" value="' . $result['first_name'] . '" />
                            </div>
                            <label class="col-md-3 control-label">Last name</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="empLastName" placeholder="" value="' . $result['last_name'] . '" />
                            </div>
                            <label class="col-md-3 control-label">Gender</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="empGender" pattern="M|F" size="32" title="only letter M or F is allowed" value="' . $result['gender'] . '" />
                            </div>
                            <label class="col-md-3 control-label">Hire date</label>
                            <div class="col-md-8">
                                <input required type="date" class="form-control" name="empHireDate" placeholder="" value="' . $result['hire_date'] . '" />
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-s" onclick="Edit()">Spremi</button>
                        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
                    </div>
                </div>';
            }

            break;
        
        
        
        
        
        case 'delete_employee':
            if (isset($_GET['emp_id'])) {

                $query = "SELECT * FROM employees WHERE emp_no = " . $_GET['emp_id'];
                $oResult = $oConnection->query($query);
                $row = array();
                while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                    $row[] = $oRow;
                }
                $result = $row[0];

                echo 
                '<div class="modal-body" style="padding:0">
                    <div class="modal-header" style="margin-bottom:25px;">
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color:white">Obrisi zaposlenika</h4>
                    </div>
                    <form class="form-horizontal" id="deleteEmployee">
                        <input type="hidden" value="DeleteEmployee" name="action_id">
                        <input type="hidden" id="emp_id" value="' . $result['emp_no'] . '" name="empId">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Birth date</label>
                            <div class="col-md-8">
                                <input required type="date" class="form-control" placeholder="" disabled name="empBirthDate" value="' . $result['birth_date'] . '"/>
                            </div>
                            <label class="col-md-3 control-label">First name</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="empFirstName" disabled placeholder="" value="' . $result['first_name'] . '" />
                            </div>
                            <label class="col-md-3 control-label">Last name</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="empLastName" disabled placeholder="" value="' . $result['last_name'] . '" />
                            </div>
                            <label class="col-md-3 control-label">Gender</label>
                            <div class="col-md-8">
                                <input required type="text" class="form-control" name="empGender" disabled pattern="M|F" size="32" title="only letter M or F is allowed" value="' . $result['gender'] . '" />
                            </div>
                            <label class="col-md-3 control-label">Hire date</label>
                            <div class="col-md-8">
                                <input required type="date" class="form-control" name="empHireDate" disabled placeholder="" value="' . $result['hire_date'] . '" />
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-s" onclick="Delete()">Obriši</button>
                        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
                    </div>
               </div>';
            }
            break;
        
        
        
        case 'new_department':
            echo 
                '<div class="modal-body" style="padding:0">
                    <div class="modal-header" style="margin-bottom:25px;">
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color:white">Novi odjel</h4>
                    </div>
                    <form class="form-horizontal" id="editDepartment">
                        <input type="hidden" value="AddDepartment" name="action_id">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Naziv odjela</label>
                            <div class="col-md-8">
                                <input required type="text" id="nam" class="form-control" placeholder="Naziv odjela" name="depName"  />
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-s" onclick="Edit()">Spremi</button>
                        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
                    </div>
                </div>';
            break;
        
        
        
        
        case 'edit_department':

            if (isset($_GET['dep_id'])) {

               $query = "SELECT * FROM departments WHERE dept_no = '".$_GET['dep_id']."'";
                $oResult = $oConnection->query($query);
                $row = array();
                while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                    $row[] = $oRow;
                }
                $result = $row[0];

                echo 
                '<div class="modal-body" style="padding:0">
                    <div class="modal-header" style="margin-bottom:25px;">
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color:white">Uredi odjel</h4>
                    </div>
                    <form class="form-horizontal" id="editDepartment">
                        <input type="hidden" value="UpdateDepartment" name="action_id">
                        <input type="hidden" value="'.$result['dept_no'].'" name="depId">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Naziv odjela</label>
                            <div class="col-md-8">
                                <input required type="text" id="nam" class="form-control" placeholder="" name="depName" value="'.$result['dept_name'].'" />
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-s" onclick="Edit()">Spremi</button>
                        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
                    </div>
                </div>';
            }
            break;
        
        
        
        
        case 'delete_deparmtent':
            if (isset($_GET['dep_id'])) {

                $query = "SELECT * FROM departments WHERE dept_no = '".$_GET['dep_id']."'";
                $oResult = $oConnection->query($query);
                $row = array();
                while ($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                    $row[] = $oRow;
                }
                $result = $row[0];

                echo 
                '<div class="modal-body" style="padding:0">
                    <div class="modal-header" style="margin-bottom:25px;">
                        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="color:white">Obrisi odjel</h4>
                    </div>
                    <form class="form-horizontal" id="deleteDepartment">
                        <input type="hidden" value="DeleteDepartment" name="action_id">
                        <input type="hidden"  value="'.$result['dept_no'].'" name="depId">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Naziv odjela</label>
                            <div class="col-md-8">
                                <input required disabled type="text" id="nam" class="form-control" placeholder="" name="depName" value="'.$result['dept_name'].'" />
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-s" onclick="Delete()">Obriši</button>
                        <button type="button" class="btn btn-success btn-s" data-dismiss="modal">Zatvori</button>
                    </div>
                </div>';
            }
            break;

        
        
        
        default:
            Console.log("Kriva akcija");
            break;
    }
}
