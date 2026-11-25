<?php
// Acesso do administrador (quem gerencia os clientes). Troque a senha antes de publicar.
// Usuário: admin | Senha inicial: Mecatec@2026
if (session_status() === PHP_SESSION_NONE) session_start();
const ADMIN_USER = 'admin';
const ADMIN_HASH = '$2b$10$xF7VPOP7Abk1iIvlLLAXeefuETTFp9kpoQwHOalzsBZvaN4tlYAU.';
function admin_logado() { return !empty($_SESSION['admin']); }
function exigir_admin() {
    if (!admin_logado()) { header('Location: admin.php'); exit; }
}
