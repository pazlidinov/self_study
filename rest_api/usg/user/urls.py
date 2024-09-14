from django.urls import path
from rest_framework.routers import DefaultRouter
from .views import ProfileViewset, index

app_name='user'

router =DefaultRouter()
router.register('', ProfileViewset)

urlpatterns=[
    path('index', index, name='index')
]+router.urls