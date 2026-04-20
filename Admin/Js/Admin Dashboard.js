 
document.querySelector("button").addEventListener("click", async function () {

    let token = localStorage.getItem("token");

    try {
        let res = await fetch("http://127.0.0.1:8000/api/auth/logout", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + token
            }
        });

        let data = await res.json();

        // Even if backend fails, we still clear session (important)
        localStorage.removeItem("token");
        localStorage.removeItem("user");

        // Redirect to login page
        window.location.href = "../../Login.html";

    } catch (error) {
        // FORCE LOGOUT EVEN IF SERVER FAILS
        localStorage.removeItem("token");
        localStorage.removeItem("user");
        window.location.href = "../../Login.html";
    }
});
 