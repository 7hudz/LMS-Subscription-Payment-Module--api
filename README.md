MS Subscription & Payment Module API
Project Overview
This is a Laravel-based RESTful API for a Learning Management System (LMS) with Stripe payment integration. It provides role-based access control (Admin, Instructor, Student) and manages courses, subscriptions, and payments.

Features
🔐 Authentication & User Roles
Users can register & log in (Admin, Instructor, Student).
Role-based access control to restrict actions.
🎓 Course Management
Admin & Instructors can create, update, and delete courses.
Students can enroll in courses with an active subscription.
💳 Stripe Payment Integration
Students can subscribe to courses via Stripe Checkout.
Webhooks handle payment success, failure, and cancellations.
📊 Subscription Management
Admin & Users can view active/inactive subscriptions.
Cancel subscriptions from the system.
🔄 API Endpoints
Endpoint	Method	Description	Access
/api/register	POST	User registration	Public
/api/login	POST	User login	Public
/api/courses	GET	List all courses	All users
/api/courses	POST	Create a course	Admin/Instructor
/api/courses/{id}	DELETE	Delete a course	Admin
/api/subscribe	POST	Subscribe to a course	Student
/api/subscriptions	GET	List subscriptions	Admin/Student

