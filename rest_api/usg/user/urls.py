from django.urls import path
from rest_framework.routers import DefaultRouter
from .views import ProfileViewset

app_name='user'

router =DefaultRouter()
router.register('', ProfileViewset)

urlpatterns=[
    
]+router.urls