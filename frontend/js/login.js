const tabLogin = document.getElementById("tab-login");
    const tabSignup = document.getElementById("tab-signup");
    const btnText = document.getElementById("btn-text");

    function showTab(tab) {
      if (tab === "login") {
        tabLogin.classList.add("active");
        tabSignup.classList.remove("active");
        btnText.textContent = "Entrar";
      } else {
        tabSignup.classList.add("active");
        tabLogin.classList.remove("active");
        btnText.textContent = "Criar Conta";
      }
    }

    // Exemplo simples de envio
    document.getElementById("form").addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("email").value;
      const senha = document.getElementById("senha").value;
      alert(`E-mail: ${email}\nSenha: ${senha}`);
    });