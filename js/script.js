$(document).ready(function() {
    
    
    
$("#join").on("click", function(e) {
    game.join();
    e.preventDefault();
});
    
var game = {
    
    roomCode: "----",
    
    joined: false,
    
    join: function() {
        var username = $("#username").val();
        var d1 = $("#digit1").val();
        var d2 = $("#digit2").val();
        var d3 = $("#digit3").val();
        var d4 = $("#digit4").val();
        roomCode = d1+d2+d3+d4;
        console.log(roomCode);
        $.ajax({type: "GET", 
                url: "ajax/joinRoom.php",
                data: { username: username,
                        roomCode: roomCode
                      },
                dataType: "json",
                success: function(response) {
                    if(response.joined) {
                        joined = true;
                        game.toLobby();
                    }
                    else {
                        alert("Could not join game. Re-check your room code.");
                    }
                },
        });
            
    },
    
    toLobby: function() {
        console.log("tolobby");
    },
    
};
               
               
    
});