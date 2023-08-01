from django.urls import path
from .views import *
app_name = 'quiz_box'
urlpatterns = [
    path('' , home_page, name='home'),
    path('quiz/' , quiz_page_view , name='quiz')
]
