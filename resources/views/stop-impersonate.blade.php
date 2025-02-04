<style>
    .imp-btn{
    background: #12628a; 
    color: white; 
    padding: 10px 20px; 
    border-radius: 5px; 
    text-decoration: none;
    }
    
    
    .imp-btn:hover{
    background: #134a66; 
    }
    
     .bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6); /* Black with 60% transparency */
            padding: 15px 0;
            text-align: center;
        }
    
        .stop-imp-btn {
            background-color: #cc2f2f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration:none
        }
    
        .stop-imp-btn:hover {
            background-color: #822323;
        }
    </style>
    
    @if(session()->has('impersonator'))
    <div class="bottom-bar">
            <a href="{{ route('impersonate.stop') }}" class="stop-imp-btn">
                Stop Impersonation
            </a>
        </div>
    @endif