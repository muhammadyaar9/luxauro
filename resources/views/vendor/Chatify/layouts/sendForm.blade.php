<!-- <div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span>
        <input disabled='disabled' type="file"
         class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div> -->
<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <input readonly='readonly' type="text" class="m-send app-scroll" name="message" class="p-2 w-100 my-3 input-type" placeholder="Press enter to send message">
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>
<!-- <div class="bottom-section-icon d-flex justify-content-between align-items-center">
    <div class="left-icon">
        <ul class="list-unstyled d-flex">
            <li><button class="btn-icon"><i class="fa fa-font" aria-hidden="true"></i></button></li>
            <li><button class="btn-icon"><i class="fa fa-paperclip" aria-hidden="true"></i></button></li>
            <li><button class="btn-icon"><i class="fa fa-link" aria-hidden="true"></i></button></li>
            <li><button class="btn-icon"><i class="fa fa-smile-o" aria-hidden="true"></i></button></li>
        </ul>
    </div>
    <div class="right-icon">
        <ul class="list-unstyled">
            <li><button class="btn-icon"><i class="fa fa-cog" aria-hidden="true"></i></button></li>
        </ul>
    </div>
</div> -->