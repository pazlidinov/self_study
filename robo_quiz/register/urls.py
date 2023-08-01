from django.urls import path
from .views import *
app_name = 'register'
urlpatterns = [
    path('' , home_page, name='home'),
    path('profile/' , ProfileView, name='profile'),
    path('login/' , LoginView, name='login'),
    path('add/leed/user/' , Add_leed_user , name='add_user'),
    path("questions/", questions, name="quiz")
]
