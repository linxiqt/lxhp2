
<?php
$page='friends';
 include('header.php') ;

?>
<div class="friendlinks-container">
    <div class="header-action">
        <h1 class="friendlinks-title">友情链接</h1>
        <button class="apply-button" onclick="showApplicationForm()">
            <span>+ 申请友链</span>
        </button>
    </div>
    
    <div class="friend-links">
        <?= echoFriends() ?>
    </div>
</div>

<div class="application-modal" id="applicationModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>友链申请</h2>
            <button class="close-btn" onclick="closeModal()">&times;</button>
        </div>
        
        <form class="application-form" id="friendForm">
            <div class="form-group">
                <label>网站名称</label>
                <input type="text" name="name" required placeholder="请输入完整网站名称">
            </div>
            
            <div class="form-group">
                <label>网站URL</label>
                <input type="url" name="href" required placeholder="https://example.com">
            </div>
            
            <div class="form-group">
                <label>网站描述</label>
                <textarea name="des" required placeholder="简单描述网站内容(50字以内)" maxlength="50"></textarea>
            </div>
            
            <div class="form-group">
                <label>Logo URL</label>
                <input type="url" name="ico" placeholder="https://example.com/logo.png">
            </div>
            
            <div class="form-actions">
                <button type="button" class="cancel-btn" onclick="closeModal()">取消</button>
                <button type="submit" class="submit-btn">
                    <span class="submit-text">提交申请</span>
                    <div class="loading-dots"></div>
                </button>
            </div>
        </form>
    </div>
</div>


<script>

function showApplicationForm() {
    const modal = document.getElementById('applicationModal');
    modal.style.display = 'flex';
   
}

function closeModal() {
    const modal = document.getElementById('applicationModal');
    modal.style.display = 'none';
   
}


window.onclick = function(event) {
    const modal = document.getElementById('applicationModal');
    if (event.target === modal) {
        closeModal();
    }
}


function showAlert(message, type = 'success') {
    const alert = document.createElement('div');
    alert.className = `alert-message alert-${type}`;
    alert.textContent = message;
    document.body.appendChild(alert);
    
    setTimeout(() => {
        alert.remove();
    }, 3000);
}

document.getElementById('friendForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const form = e.target;
    const submitBtn = form.querySelector('.submit-btn');
    const submitText = submitBtn.querySelector('.submit-text');
    const loadingDots = submitBtn.querySelector('.loading-dots');
    

    submitBtn.disabled = true;
    submitText.style.opacity = '0';
    loadingDots.style.display = 'block';
    
    try {
        const formData = new FormData(form);
        const response = await fetch('/usr/friends.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.code === 1) {
            showAlert('申请已提交，请等待审核');
            form.reset();
            closeModal();
        } else {
            showAlert(result.msg || '提交失败', 'error');
        }
    } catch (error) {
        showAlert('网络请求失败', 'error');
    } finally {
        submitBtn.disabled = false;
        submitText.style.opacity = '1';
        loadingDots.style.display = 'none';
    }
});


document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>

<?php include('footer.php') ?>