<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Body Styling */
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container */
        .form-container {
            width: 90%;
            max-width: 900px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        /* Heading */
        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        /* Inputs & Select Fields */
        .form-grid input,
        .form-grid select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-grid input:focus,
        .form-grid select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        /* Toggle Password Visibility */
        .toggle-password {
            position: relative;
            cursor: pointer;
            margin-left: -30px;
        }

        /* Error Messages */
        .text-danger {
            font-size: 12px;
            color: red;
            display: block;
            margin-top: 5px;
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 500px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Row 1: Name Fields -->
            <div class="form-grid">
                <div>
                    <input type="text" name="firstname" placeholder="First Name" required>
                    @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="text" name="secondname" placeholder="Second Name" required>
                    @error('secondname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="text" name="lastname" placeholder="Last Name" required>
                    @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 2: Email & Password Fields -->
            <div class="form-grid">
                <div>
                    <input type="email" name="email" placeholder="Email" required>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password', 'eyePassword')">
                        <i class="fa fa-eye" id="eyePassword"></i>
                    </span>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div style="position: relative;">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm Password" required>
                    <span class="toggle-password"
                        onclick="togglePassword('password_confirmation', 'eyeConfirmPassword')">
                        <i class="fa fa-eye" id="eyeConfirmPassword"></i>
                    </span>
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Row 3: Dropdowns -->
            <div class="form-grid">
                <div>
                    <select name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <select id="role" name="role" required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="teacher">Instructor</option>
                        <option value="student">Student</option>
                    </select>
                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-grid">
                <div style="grid-column: span 3;">
                    <input type="submit" value="Register" class="btn">
                </div>
            </div>
        </form>

        <p>Already have an account?</p>
        <a href="{{ route('loginForm') }}">Sign In</a>
    </div>

    <script>
        function togglePassword(fieldId, eyeId) {
            let field = document.getElementById(fieldId);
            let eye = document.getElementById(eyeId);
            if (field.type === "password") {
                field.type = "text";
                eye.classList.add("fa-eye-slash");
                eye.classList.remove("fa-eye");
            } else {
                field.type = "password";
                eye.classList.add("fa-eye");
                eye.classList.remove("fa-eye-slash");
            }
        }
    </script>

</body>

</html>