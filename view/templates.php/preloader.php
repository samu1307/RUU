<script src="<?php echo $jsPath ?>" defer></script>
<style>
.loadBody{
    height: 100vh;
    overflow: hidden;
}
.loadDiv{
    opacity: 0;
    pointer-events: none;
}
.spinner {
    top: 0;
    left: 0;
    width: 100vw;
    z-index: 500;
    height: 100vh;
    display: flex;
    position: absolute;
    transition: all .3s;
    align-items: center;
    justify-content: center;
    background-color: #E5E9F6;
}

.spinner > div {
    width: 18px;
    height: 18px;
    margin: 0 3px;
    transition: all .3s;
    border-radius: 100%;
    display: inline-block;
    box-shadow: 0 0 10px currentColor;
    animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
    -webkit-animation-delay: -0.32s;
    animation-delay: -0.32s;
}

.spinner .bounce2 {
    -webkit-animation-delay: -0.16s;
    animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
    0%, 80%, 100% { -webkit-transform: scale(0) }
    40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
    0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
    } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
    }
}
</style>
<div class="spinner">
    <div class="bounce1" style="background: #4AA163; color: #4AA163;"></div>
    <div class="bounce2" style="background: #FF5959; color: #FF5959;"></div>
    <div class="bounce3" style="background: #F2E63C; color: #F2E63C;"></div>
</div>