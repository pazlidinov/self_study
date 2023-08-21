from .serializers import PostSerializers
from rest_framework.generics import ListCreateAPIView, RetrieveUpdateDestroyAPIView
from .models import Post
from rest_framework import permissions
from .permissions import IsAuthorOrReadOnly
# Create your views here.


class PostList(ListCreateAPIView):
    queryset = Post.objects.all()
    serializer_class = PostSerializers


class PostDetail(RetrieveUpdateDestroyAPIView):
    permission_classes = (IsAuthorOrReadOnly,)
    queryset = Post.objects.all()
    serializer_class = PostSerializers
